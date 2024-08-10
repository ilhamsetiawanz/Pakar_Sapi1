@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Tambah Data Penyakit')

@section('content')
<div>
    <div class="w-full mt-12">
        <div class="bg-white overflow-auto">
            <!-- Form Tambah Data Penyakit -->
            <form action="{{ route('Simpan-Penyakit') }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded-lg shadow-xl">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="penyakit">Nama Penyakit</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="penyakit"
                        name="Penyakit"
                        type="text"
                        required
                        placeholder="Nama Penyakit"
                        aria-label="Nama Penyakit"
                        value="{{ old('Penyakit') }}"
                    >
                    @error('Penyakit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="kode-penyakit">Kode Penyakit</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="kode-penyakit"
                        name="KodePenyakit"
                        type="text"
                        required
                        placeholder="Kode Penyakit"
                        aria-label="Kode Penyakit"
                        value="{{ old('KodePenyakit') }}"
                    >
                    @error('KodePenyakit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="deskripsi">Deskripsi</label>
                    <textarea
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="deskripsi"
                        name="deskripsi"
                        required
                        placeholder="Deskripsi"
                        aria-label="Deskripsi"
                    >{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="image">Gambar</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="image"
                        name="image"
                        type="file"
                        required
                        aria-label="Gambar"
                    >
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="solusi">Solusi</label>
                    <textarea
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="solusi"
                        name="solusi"
                        required
                        placeholder="Solusi"
                        aria-label="Solusi"
                    >{{ old('solusi') }}</textarea>
                    @error('solusi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="pencegahan">Pencegahan</label>
                    <textarea
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="pencegahan"
                        name="Pencegahan"
                        required
                        placeholder="Pencegahan"
                        aria-label="Pencegahan"
                    >{{ old('Pencegahan') }}</textarea>
                    @error('Pencegahan')
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
