<?php

namespace App\Http\Controllers;

use App\Models\Laporan_Bulanan;
use App\Models\Penyakit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Dapatkan tahun dari request atau gunakan tahun saat ini sebagai default
        $tahun = $request->input('tahun', Carbon::now()->year);

        // Dapatkan daftar tahun yang tersedia
        $tahunList = Laporan_Bulanan::selectRaw('YEAR(Tanggal_Diagnosa) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // Dapatkan data bulanan untuk tahun yang dipilih
        $laporanBulanan = Laporan_Bulanan::selectRaw('MONTH(Tanggal_Diagnosa) as bulan, COUNT(*) as jumlah')
            ->whereYear('Tanggal_Diagnosa', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Dapatkan data tahunan
        $laporanTahunan = Laporan_Bulanan::selectRaw('YEAR(Tanggal_Diagnosa) as tahun, COUNT(*) as jumlah')
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();

        // Dapatkan jumlah diagnosis tiap penyakit per tahun
        $laporanPenyakitTahunan = Laporan_Bulanan::selectRaw('penyakits.Penyakit as nama_penyakit, COUNT(*) as jumlah')
            ->join('penyakits', 'laporan__bulanans.kdPenyakit', '=', 'penyakits.id')
            ->whereYear('Tanggal_Diagnosa', $tahun)
            ->groupBy('penyakits.Penyakit')
            ->orderBy('penyakits.Penyakit')
            ->get();

        // Persiapkan data untuk grafik
        $labelsBulanan = $laporanBulanan->pluck('bulan')->all();
        $valuesBulanan = $laporanBulanan->pluck('jumlah')->all();

        $labelsTahunan = $laporanTahunan->pluck('tahun')->all();
        $valuesTahunan = $laporanTahunan->pluck('jumlah')->all();

        $labelsPenyakitTahunan = $laporanPenyakitTahunan->pluck('nama_penyakit')->all();
        $valuesPenyakitTahunan = $laporanPenyakitTahunan->pluck('jumlah')->all();

        $penyakit = Penyakit::all();

        return view('pages.admin.Home', [
            'tahun' => $tahun,
            'tahunList' => $tahunList,
            'labelsBulanan' => $labelsBulanan,
            'valuesBulanan' => $valuesBulanan,
            'labelsTahunan' => $labelsTahunan,
            'valuesTahunan' => $valuesTahunan,
            'labelsPenyakitTahunan' => $labelsPenyakitTahunan,
            'valuesPenyakitTahunan' => $valuesPenyakitTahunan,
            'penyakit' => $penyakit
        ]);
    }
}
