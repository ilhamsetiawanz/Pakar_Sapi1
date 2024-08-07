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
        $laporan = Laporan_Bulanan::orderBy('Tanggal_Diagnosa', 'desc')->paginate(20);
        $penyakit = Penyakit::all();


        return view('pages.admin.Report.index', [
            'laporan' => $laporan,
            'penyakit' => $penyakit,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporan_BulananRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan_Bulanan $laporan_Bulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan_Bulanan $laporan_Bulanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporan_BulananRequest $request, Laporan_Bulanan $laporan_Bulanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan_Bulanan $laporan_Bulanan)
    {
        //
    }
}
