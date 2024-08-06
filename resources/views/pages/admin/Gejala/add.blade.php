@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Tambah Data Gejala')

@section('content')
<div>
    <div class="w-full mt-12">
        <div class="bg-white overflow-auto">
            <!-- Header dengan Search Bar dan Tombol Tambah Data -->
            <form action="{{ route('Simpan-Gejala') }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded-lg shadow-xl">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="kode-gejala">Kode Gejala</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="kode-gejala"
                        name="KodeGejala"
                        type="text"
                        required
                        placeholder="Kode Gejala"
                        aria-label="Kode Gejala"
                        {{-- value="{{ old('KodeGejala') }}" --}}
                    >
                    @error('KodeGejala')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="nama-gejala">Nama Gejala</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="nama-gejala"
                        name="NamaGejala"
                        type="text"
                        required
                        placeholder="Nama Gejala"
                        aria-label="Nama Gejala"
                        {{-- value="{{ old('NamaGejala') }}" --}}
                    >
                    @error('NamaGejala')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <button class="px-6 py-2 text-white font-light tracking-wider bg-blue-500 hover:bg-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
