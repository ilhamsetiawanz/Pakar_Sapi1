@extends('layouts.layouts')

@section('title', 'Detail Laporan Diagnosa')

@section('pageName', 'Detail Laporan Diagnosa')

@section('content')
<div>
    <div class="w-full mt-12">
        <div class="bg-white overflow-auto p-10 rounded-lg shadow-xl">
            <h2 class="text-xl font-bold text-gray-700">Detail Laporan Diagnosa</h2>
            
            <!-- Informasi Peternak -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Informasi Peternak</h3>
                <p class="text-gray-600"><strong>Nama:</strong> {{ $laporan->nama_peternak }}</p>
                <p class="text-gray-600"><strong>Tanggal Diagnosa:</strong> {{ date('d F Y', strtotime($laporan->Tanggal_Diagnosa)) }}</p>
            </div>

            <!-- Gejala yang Dipilih -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Gejala yang Dipilih</h3>
                @if ($laporan->gejala)
                    @php
                        $gejalaIds = json_decode($laporan->gejala);
                        $gejalaDetails = App\Models\DataGejala::whereIn('id', $gejalaIds)->pluck('NamaGejala')->toArray();
                    @endphp
                    <ul class="list-disc list-inside text-gray-600">
                        @foreach ($gejalaDetails as $gejala)
                            <li>{{ $gejala }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600 italic">Tidak ada data gejala yang dipilih.</p>
                @endif
            </div>

            <!-- Hasil Diagnosa -->
            @if ($penyakit)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-700">Hasil Diagnosa</h3>
                    <p class="text-gray-600"><strong>Penyakit Terdiagnosis:</strong> {{ $penyakit->Penyakit }}</p>
                    <p class="text-gray-600"><strong>Deskripsi Penyakit:</strong> {{ $penyakit->Deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
                </div>

                <!-- Solusi -->
                @if ($penyakit->Solusi)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-700">Solusi</h3>
                        <p class="text-gray-600"><strong>Solusi:</strong> {{ $penyakit->Solusi->solusi }}</p>
                        <p class="text-gray-600"><strong>Pencegahan:</strong> {{ $penyakit->Solusi->Pencegahan }}</p>
                    </div>
                @else
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-700">Solusi</h3>
                        <p class="text-gray-600">Belum ada solusi yang tersedia untuk penyakit ini.</p>
                    </div>
                @endif

                <p class="mt-4 italic text-gray-600">Hasil ini hanya diagnosa sementara. Diperlukan diagnosa lebih lanjut untuk mendapatkan hasil yang lebih akurat.</p>
            @else
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-gray-700">Tidak Ditemukan Penyakit</h3>
                    <p class="text-gray-600">Tidak ada penyakit yang dapat diidentifikasi berdasarkan gejala yang dipilih. Silakan coba lagi dengan memilih gejala lain.</p>
                </div>
            @endif

            <!-- Tombol Kembali -->
            <div class="mt-6">
                <a href="{{ route('Laporan-Bulanan') }}" class="px-6 py-2 text-white font-light tracking-wider bg-blue-500 hover:bg-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Kembali ke Laporan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
