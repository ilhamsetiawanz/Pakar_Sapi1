<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PDFController extends Controller
{
    public function PDFExport() {
        $data = DataGejala::all();
    
        $pdf = Pdf::loadView('pages.admin.Gejala.index', compact('data'));
    
        // Generate a filename with current date and time
        $filename = now()->format('Ymd_His') . '_Laporan.pdf';
    
        return $pdf->download($filename);
    }
    
}
