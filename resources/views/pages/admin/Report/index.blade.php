@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Laporan Bulanan')
@section('content')
    <div>
        <div class="w-full mt-12">
            <div class="flex justify-between items-center pb-4">
                <p class="text-xl flex items-center">
                    <i class="fas fa-list mr-3"></i> Laporan Bulanan
                </p>
                <div class="w-1/3">
                    <form action="{{ route('Laporan-Bulanan') }}" method="GET" class="flex gap-2">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama peternak..."
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        >
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none"
                        >
                            Cari
                        </button>
                        @if(request('search'))
                            <a    href="{{ route('Laporan-Bulanan') }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none"
                            >
                                Reset
                            </a>
                        @endif
                    </form>
                </div>
            </div>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">No</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Peternak</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Tanggal Diagnosa</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gejala yang Dipilih</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Hasil Diagnosa</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $laporanBulanan)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $loop->iteration + ($laporan->currentPage() - 1) * $laporan->perPage() }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $laporanBulanan->nama_peternak }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $laporanBulanan->Tanggal_Diagnosa }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @if($laporanBulanan->gejala)
                                    @php
                                        $gejalaIds = json_decode($laporanBulanan->gejala);
                                        $gejalaNames = App\Models\DataGejala::whereIn('id', $gejalaIds)->pluck('NamaGejala')->toArray();
                                    @endphp
                                    <ul class="list-disc list-inside">
                                        @foreach($gejalaNames as $gejala)
                                            <li>{{ $gejala }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500 italic">Tidak ada data gejala</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @foreach ($penyakit as $hasil)
                                    @if ($laporanBulanan->kdPenyakit === $hasil->id)
                                        {{ $hasil->Penyakit }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <a href="{{ route('Laporan-Bulanan.detail', $laporanBulanan->id) }}" 
                                   class="text-blue-500 hover:text-blue-700 transition-colors duration-200">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-4 px-6 border-b border-grey-light text-center">Tidak ada data</td>
                        </tr>
                        @endforelse                    
                    </tbody>
                </table>
                <div class="m-10 px-3">
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        {{-- Tombol Previous --}}
                        @if($laporan->onFirstPage())
                            <button disabled class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 bg-gray-100 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <a href="{{ $laporan->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                
                        {{-- Tombol Next --}}
                        @if ($laporan->hasMorePages())
                            <a href="{{ $laporan->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.21 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <button disabled class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 bg-gray-100 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.21 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection