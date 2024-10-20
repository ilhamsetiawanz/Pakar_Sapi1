@extends('layouts.layouts')

@section('title', 'Hasil Diagnosis')

@section('pageName', 'Hasil Diagnosis')

@section('content')
<div>
    <div class="w-full mt-12">
        <div class="bg-white overflow-auto p-10 rounded-lg shadow-xl">
            <h2 class="text-xl font-bold text-gray-700">Hasil Diagnosis</h2>
            
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Gejala yang Dipilih</h3>
                <ul class="list-disc list-inside text-gray-600">
                    @foreach ($gejalaDetails as $gejala)
                        <li>{{ $gejala->NamaGejala }}</li>
                    @endforeach
                </ul>
            </div>

            @if ($penyakit)
                <div class="mt-6">
                    <p class="text-gray-600"><strong>Penyakit Terdiagnosis:</strong> {{ $penyakit->Penyakit }}</p>
                    <p class="text-gray-600"><strong>Deskripsi Penyakit:</strong> {{ $penyakit->deskripsi }}</p>
                </div>

                @if ($penyakit->Solusi)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-700">Solusi</h3>
                        <p class="text-gray-600"><strong>Solusi:</strong> {{ $penyakit->Solusi->solusi }}</p>
                        <p class="text-gray-600"><strong>Pencegahan:</strong> {{ $penyakit->Solusi->Pencegahan }}</p>
                    </div>
                @else
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-700">Solusi</h3>
                        <p class="text-gray-600">Belum Ada Solusi untuk penyakit ini.</p>
                    </div>
                @endif
                <p class="mt-4 italic text-gray-600">Hasil Ini Hanya Diagnosa Sementara. Diperlukan Diagnosa Lebih Lanjut Agar Mendapatkan Hasil Yang Sesuai</p>
            @else
                <h2 class="text-xl font-bold text-gray-700 mt-6">Tidak Ditemukan Penyakit</h2>
                <p class="mt-2 text-gray-600">Tidak ada penyakit yang dapat diidentifikasi berdasarkan gejala yang dipilih. Silakan coba lagi dengan memilih gejala lain.</p>
            @endif

            <div class="mt-6">
                <a href="{{ route('Diagnosis') }}" class="px-6 py-2 text-white font-light tracking-wider bg-blue-500 hover:bg-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">Kembali ke Diagnosis</a>
            </div>
        </div>
    </div>
</div>
@endsection