<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\DataGejala;
use App\Models\Laporan_Bulanan;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function index()
    {
        $dataGejala = DataGejala::all();
    
        return view('pages.admin.Diagnosis.index',[
            'gejalas' => $dataGejala
        ]);
    }

    // Form Diagnosis
    public function processDiagnosis(Request $request)
    {
        // Mendapatkan input dari form
        $selectGejala = $request->input('gejala');
        $namaPeternak = $request->input('nama_peternak');
        $tanggalDiagnosis = $request->input('tanggal_diagnosa');
    
        // Menggunakan metode forward chaining untuk mendapatkan ID penyakit
        $penyakitId = $this->forwardChaining($selectGejala);
    
        if ($penyakitId) {
            // Menyimpan data ke dalam tabel laporan bulanan
            Laporan_Bulanan::create([
                'nama_peternak' => $namaPeternak,
                'kdPenyakit' => $penyakitId,
                'Tanggal_Diagnosa' => $tanggalDiagnosis
            ]);
    
            // Mendapatkan data penyakit dan solusinya
            $penyakit = Penyakit::with('Solusi')->find($penyakitId);
    
            // Memastikan penyakit ditemukan dan memiliki solusi
            if ($penyakit) { // Jika Penyakit ditemukan akan memunculkan halaman hasil beserta data penyakit
                return view('pages.admin.Diagnosis.result', ['penyakit' => $penyakit]);
            } else {
                // jika Kasus penyakit tidak ditemukan, meskipun ID ada akan menampilkan penyakit tidak ditemukan
                return view('pages.admin.Diagnosis.result', ['penyakit' => null]);
            }
        } else {
            // jika Kasus tidak ada penyakit yang terdiagnosis
            return view('pages.admin.Diagnosis.result', ['penyakit' => null]);
        }
    }
    

    // Algoritma Forward Chaining
    private function forwardChaining($selectGejala)
    {
        // Mendapatkan data aturan berdasarkan gejala yang dipilih
        $dataRules = Aturan::whereIn('id_gejala', $selectGejala)->get();
    
        // Menghitung kemunculan setiap penyakit berdasarkan aturan
        $countsPenyakit = [];
    
        foreach ($dataRules as $rule) {
            if (isset($countsPenyakit[$rule->id_penyakit])) {
                $countsPenyakit[$rule->id_penyakit]++;
            } else {
                $countsPenyakit[$rule->id_penyakit] = 1;
            }
        }
    
        // Memastikan ada setidaknya satu penyakit yang terdeteksi
        if (empty($countsPenyakit)) {
            return null; // Tidak ada penyakit yang cocok dengan gejala
        }
    
        // Mengambil penyakit dengan jumlah gejala yang paling banyak cocok
        $maxCount = max($countsPenyakit);
        $penyakitTerpilih = array_keys($countsPenyakit, $maxCount);
    
        // Jika ada lebih dari satu penyakit yang cocok, prioritaskan penyakit dengan gejala terbanyak yang sesuai
        if (count($penyakitTerpilih) > 1) {
            // Ambil data kaidah untuk penyakit yang terpilih
            $kaidahPenyakit = Aturan::whereIn('id_penyakit', $penyakitTerpilih)->get();
    
            $penyakitYangPalingSesuai = null;
            $maxMatchRatio = 0;
    
            foreach ($penyakitTerpilih as $penyakit) {
                // Hitung berapa banyak gejala dari penyakit ini yang sesuai dengan gejala yang dipilih
                $gejalaPenyakit = $kaidahPenyakit->where('id_penyakit', $penyakit)->pluck('id_gejala')->toArray();
                $gejalaYangSesuai = array_intersect($gejalaPenyakit, $selectGejala);
                $matchCount = count($gejalaYangSesuai);
                $totalGejalaPenyakit = count($gejalaPenyakit);
    
                // Rasio kecocokan (gejala yang sesuai dibagi total gejala penyakit)
                $matchRatio = $matchCount / $totalGejalaPenyakit;
    
                // Pilih penyakit dengan rasio kecocokan tertinggi
                if ($matchRatio > $maxMatchRatio) {
                    $maxMatchRatio = $matchRatio;
                    $penyakitYangPalingSesuai = $penyakit;
                }
            }
    
            return $penyakitYangPalingSesuai;
        }
    
        // Jika hanya ada satu penyakit yang cocok, kembalikan itu
        return $penyakitTerpilih[0];
    }
     

}
