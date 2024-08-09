<?php

namespace App\Http\Controllers;

use App\Models\Laporan_Bulanan;
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

        // Persiapkan data untuk grafik
        $labelsBulanan = $laporanBulanan->pluck('bulan')->all();
        $valuesBulanan = $laporanBulanan->pluck('jumlah')->all();
        
        $labelsTahunan = $laporanTahunan->pluck('tahun')->all();
        $valuesTahunan = $laporanTahunan->pluck('jumlah')->all();

        return view('pages.admin.Home', [
            'tahun' => $tahun,
            'tahunList' => $tahunList,
            'labelsBulanan' => $labelsBulanan,
            'valuesBulanan' => $valuesBulanan,
            'labelsTahunan' => $labelsTahunan,
            'valuesTahunan' => $valuesTahunan,
        ]);
    }
}
