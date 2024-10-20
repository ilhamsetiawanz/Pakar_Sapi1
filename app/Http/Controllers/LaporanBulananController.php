<?php

namespace App\Http\Controllers;

use App\Models\Laporan_Bulanan;
use App\Http\Requests\StoreLaporan_BulananRequest;
use App\Http\Requests\UpdateLaporan_BulananRequest;
use App\Models\Penyakit;

class LaporanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan_Bulanan::orderBy('Tanggal_Diagnosa', 'asc')->paginate(20);
        $penyakit = Penyakit::all();


        return view('pages.admin.Report.index', [
            'laporan' => $laporan,
            'penyakit' => $penyakit,
        ]);
    }

    
}
