<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\LaporanBulananController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){

    Route::get('/', function () {
        return view('pages.login');
    })->name('login');
    
    Route::post('/login', [UserController::class, 'login'])->name('postLogin');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Home');

    // Gejala
    Route::get('/gejala', [DataGejalaController::class, 'index'])->name('Gejala');
    Route::get('/tambah-gejala', [DataGejalaController::class, 'create'])->name('Tambah-Gejala');
    Route::post('/simpan-gejala', [DataGejalaController::class, 'store'])->name('Simpan-Gejala');
    Route::get('/edit-gejala/{dataGejala}', [DataGejalaController::class, 'edit'])->name('Edit-Gejala');
    Route::put('/update-gejala/{dataGejala}', [DataGejalaController::class, 'update'])->name('Save-Gejala');
    Route::delete('/delete-gejala/{dataGejala}', [DataGejalaController::class, 'destroy'])->name('Hapus-Gejala');
    // Penyakit
    Route::get('/penyakit', [PenyakitController::class, 'index'])->name('Penyakit');
    Route::get('/tambah-penyakit', [PenyakitController::class, 'create'])->name('Tambah-Penyakit');
    Route::post('/simpan-penyakit', [PenyakitController::class, 'store'])->name('Simpan-Penyakit');
    Route::get('/edit-penyakit/{penyakit}', [PenyakitController::class, 'edit'])->name('Edit-Penyakit');
    Route::put('/update-penyakit/{penyakit}', [PenyakitController::class, 'update'])->name('Save-Penyakit');
    Route::delete('/delete-penyakit/{penyakit}', [PenyakitController::class, 'destroy'])->name('Hapus-Penyakit');

    // Laporan Bulanan
    Route::get('/Laporan-Bulanan', [LaporanBulananController::class, 'index'])->name('Laporan-Bulanan');

    // Diagnosis
    Route::get('/diagnosis', [DiagnosisController::class, 'index',])->name('Diagnosis');
    Route::post('/Process-Diagnosis', [DiagnosisController::class, 'processDiagnosis'])->name('Process-Diagnosis');
});