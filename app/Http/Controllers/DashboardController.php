<?php

namespace App\Http\Controllers;

use App\Models\Laporan_Bulanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Dapatkan semua tahun yang ada dalam data laporan
        $tahunList = Laporan_Bulanan::selectRaw('YEAR(Tanggal_Diagnosa) as year')
                                    ->distinct()
                                    ->pluck('year');

        // Ambil tahun dari permintaan atau gunakan tahun saat ini sebagai default
        $tahun = $request->input('tahun', Carbon::now()->year);

        // Dapatkan data laporan berdasarkan tahun
        $laporan = Laporan_Bulanan::whereYear('Tanggal_Diagnosa', $tahun)
                                  ->get();

        // Data untuk grafik
        $data = $laporan->groupBy(function($item) {
            return Carbon::parse($item->Tanggal_Diagnosa)->month;
        })->map(function($item) {
            return $item->count();
        });

        // Isi data untuk semua bulan
        $labels = range(1, 12);
        $values = [];
        foreach ($labels as $bulan) {
            $values[] = $data->get($bulan, 0); // jika bulan tidak ada, gunakan nilai default 0
        }

        return view('pages.admin.home', [
            'labels' => $labels,
            'values' => $values,
            'tahun' => $tahun,
            'tahunList' => $tahunList,
        ]);
    }
}
