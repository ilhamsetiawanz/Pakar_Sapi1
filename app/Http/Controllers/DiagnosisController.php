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
            if ($penyakit) {
                return view('pages.admin.Diagnosis.result', ['penyakit' => $penyakit]);
            } else {
                // Kasus penyakit tidak ditemukan, meskipun ID ada
                return view('pages.admin.Diagnosis.result', ['penyakit' => null]);
            }
        } else {
            // Kasus tidak ada penyakit yang terdiagnosis
            return view('pages.admin.Diagnosis.result', ['penyakit' => null]);
        }
    }
    

    // Algoritma Forward Chaining
    private function forwardChaining($selectGejala)
    {
        $dataRules = Aturan::whereIn('id_gejala', $selectGejala)->get();
        $countsPenyakit = [];

        foreach($dataRules as $rule){
            if(isset($countsPenyakit[$rule->id_penyakit])) {
                $countsPenyakit[$rule->id_penyakit]++;
            }else{
                $countsPenyakit[$rule->id_penyakit] = 1;
            }
        }
        arsort($countsPenyakit);

        return key($countsPenyakit);
    }

}
