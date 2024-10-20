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
        $selectGejala = $request->input('gejala');
        $namaPeternak = $request->input('nama_peternak');
        $tanggalDiagnosis = $request->input('tanggal_diagnosa');

        $penyakitId = $this->forwardChaining($selectGejala);

        // Convert selected gejala IDs to JSON
        $gejalaJson = json_encode($selectGejala);

        // Fetch gejala details
        $gejalaDetails = DataGejala::whereIn('id', $selectGejala)->get();

        // Create a new Laporan_Bulanan record regardless of whether a disease is found
        $laporan = Laporan_Bulanan::create([
            'nama_peternak' => $namaPeternak,
            'kdPenyakit' => $penyakitId ?? null, // Use null if no disease is found
            'Tanggal_Diagnosa' => $tanggalDiagnosis,
            'gejala' => $gejalaJson  // Save selected gejala as JSON
        ]);

        if ($penyakitId) {
            $penyakit = Penyakit::with('Solusi')->find($penyakitId);
        } else {
            $penyakit = null;
        }

        return view('pages.admin.Diagnosis.result', [
            'penyakit' => $penyakit,
            'gejalaDetails' => $gejalaDetails
        ]);
    }
    

    // Algoritma Forward Chaining
    private function forwardChaining($selectGejala)
    {
        // Mendapatkan semua aturan yang relevan dengan gejala yang dipilih
        $relevantRules = Aturan::whereIn('id_gejala', $selectGejala)->get();
    
        // Mengelompokkan aturan berdasarkan penyakit
        $rulesByDisease = [];
        foreach ($relevantRules as $rule) {
            if (!isset($rulesByDisease[$rule->id_penyakit])) {
                $rulesByDisease[$rule->id_penyakit] = [];
            }
            $rulesByDisease[$rule->id_penyakit][] = $rule->id_gejala;
        }
    
        $matchResults = [];
        foreach ($rulesByDisease as $idPenyakit => $gejalaPenyakit) {
            // Menghitung gejala yang cocok
            $matchingGejala = array_intersect($gejalaPenyakit, $selectGejala);
            $matchingCount = count($matchingGejala);
            $totalGejalaPenyakit = count($gejalaPenyakit);
            $unmatchedGejala = count($selectGejala) - $matchingCount;
    
            // Hanya mempertimbangkan penyakit jika semua gejala penyakit ada dalam gejala yang dipilih
            if ($matchingCount == $totalGejalaPenyakit) {
                $matchResults[$idPenyakit] = [
                    'matchingCount' => $matchingCount,
                    'unmatchedGejala' => $unmatchedGejala,
                    'totalGejalaPenyakit' => $totalGejalaPenyakit
                ];
            }
        }
    
        // Jika tidak ada penyakit yang cocok sempurna, kembalikan null
        if (empty($matchResults)) {
            return null;
        }
    
        // Mengurutkan hasil berdasarkan jumlah gejala yang cocok (descending) 
        // dan jumlah gejala yang tidak cocok (ascending)
        uasort($matchResults, function($a, $b) {
            if ($a['matchingCount'] != $b['matchingCount']) {
                return $b['matchingCount'] - $a['matchingCount'];
            }
            return $a['unmatchedGejala'] - $b['unmatchedGejala'];
        });
    
        // Mengambil penyakit dengan kecocokan terbaik
        $bestMatch = array_key_first($matchResults);
        $bestMatchData = $matchResults[$bestMatch];
    
        // Memastikan bahwa penyakit memenuhi kriteria minimum
        if ($bestMatchData['matchingCount'] >= 2 && $bestMatchData['unmatchedGejala'] <= 1) {
            return $bestMatch;
        }
    
        // Jika tidak ada penyakit yang memenuhi kriteria, kembalikan null
        return null;
    }
}
