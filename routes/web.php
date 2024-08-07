<?php

use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){

    Route::get('/', function () {
        return view('pages.login');
    })->name('login');
    
    Route::post('/login', [UserController::class, 'login'])->name('postLogin');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function(){
        return view('pages.admin.home');
    })->name('dashboard');

    // Gejala
    Route::get('/gejala', [DataGejalaController::class, 'index'])->name('Gejala');
    Route::get('/tambah-gejala', [DataGejalaController::class, 'create'])->name('Tambah-Gejala');
    Route::post('/simpan-gejala', [DataGejalaController::class, 'store'])->name('Simpan-Gejala');
    Route::get('/edit-gejala/{dataGejala}', [DataGejalaController::class, 'edit'])->name('Edit-Gejala');
    Route::put('/update-gejala/{dataGejala}', [DataGejalaController::class, 'update'])->name('Save-Gejala');
    Route::delete('/delete-gejala/{dataGejala}', [DataGejalaController::class, 'destroy'])->name('Hapus-Gejala');
    // Penyakit

    // Aturan

    // Solusi

    // Laporan Bulanan

    // Diagnosis
    Route::get('/diagnosis', [DiagnosisController::class, 'index',])->name('Diagnosis');
    Route::post('/Process-Diagnosis', [DiagnosisController::class, 'processDiagnosis'])->name('Process-Diagnosis');
});