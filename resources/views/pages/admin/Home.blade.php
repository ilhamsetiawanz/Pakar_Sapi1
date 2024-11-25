@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Dashboard')
@section('content')
    <div class="bg-gray-100 flex w-full">
        <div class="w-full rounded overflow-hidden shadow-lg bg-white">
            <div class=" w-full px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center">Sistem Pakar</div>
                <p class="text-gray-700 text-base text-center">
                    Akurasi sistem: <span class="font-bold text-green-600">87.5%</span>
                </p>
            </div>
            <div class="px-6 pt-4 pb-2 text-center">
                <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-blue-700 mr-2 mb-2">Akurasi Tinggi</span>
            </div>
        </div>
    </div>
    <div>
        <div class= "w-full m-3">
            @include('components.grafik')
        </div>
        <div>
            @if (Auth::user()->role == 'admin')
                @include('components.table.penyakit')            
            @endif
        </div>
    </div>
@endsection
