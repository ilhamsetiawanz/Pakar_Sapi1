@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Dashboard')
@section('content')
    <div>
        <div class= "w-full m-3">
            @include('components.grafik')
        </div>
        <div>
            @include('components.table.penyakit')
        </div>
    </div>
@endsection
