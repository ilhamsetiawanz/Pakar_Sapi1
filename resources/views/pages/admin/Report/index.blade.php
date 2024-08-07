@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Laporan Bulanan')
@section('content')
    <div>
        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Laporan Bulanan
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">No</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Peternak</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Tanggal Diagnosa</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Hasil Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $laporanBulanan)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $loop->iteration }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $laporanBulanan->nama_peternak }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $laporanBulanan->Tanggal_Diagnosa }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach ($penyakit as $hasil)
                                        @if ($laporanBulanan->kdPenyakit === $hasil->id)
                                            {{ $hasil->Penyakit }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
                <div>
                    <p>lol</p>
                </div>
            </div>
        </div>
    </div>
@endsection
