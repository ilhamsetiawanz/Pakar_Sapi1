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
                            <td class="py-4 px-6 border-b border-grey-light">{{ $loop->iteration + ($laporan->currentPage() - 1) * $laporan->perPage() }}</td>
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
                        <tr>
                            <td colspan="4" class="py-4 px-6 border-b border-grey-light text-center">Tidak ada data</td>
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
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.21 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <a href="{{ $laporan->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.21 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                
                        {{-- Nomor Halaman --}}
                        {{-- @for ($page = 1; $page <= $laporan->lastPage(); $page++)
                            <a href="{{ $laporan->url($page) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 {{ $laporan->currentPage() == $page ? 'bg-blue-100 text-blue-600' : '' }}">
                                {{ $page }}
                            </a>
                        @endfor --}}
                
                        {{-- Tombol Next --}}
                        @if ($laporan->hasMorePages())
                            <a href="{{ $laporan->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <button disabled class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 bg-gray-100 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l-4.5-4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
@endsection
