<?php
namespace App\Http\Controllers;

use App\Models\Laporan_Bulanan;
use App\Http\Requests\StoreLaporan_BulananRequest;
use App\Http\Requests\UpdateLaporan_BulananRequest;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
       
        $laporan = Laporan_Bulanan::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_peternak', 'LIKE', "%{$search}%");
            })
            ->orderBy('Tanggal_Diagnosa', 'asc')
            ->paginate(20)
            ->withQueryString();
           
        $penyakit = Penyakit::all();
        return view('pages.admin.Report.index', [
            'laporan' => $laporan,
            'penyakit' => $penyakit,
            'search' => $search,
        ]);
    }

    public function show($id)
    {
        // Find the report
        $laporan = Laporan_Bulanan::findOrFail($id);
        
        // Get related disease information using kdPenyakit
        $penyakit = Penyakit::where('id', $laporan->kdPenyakit)->firstOrFail();
        
        // Get gejala if needed
        $gejalaIds = json_decode($laporan->gejala);
        
        return view('pages.admin.Report.detail', [
            'laporan' => $laporan,
            'penyakit' => $penyakit
        ]);
    }
}