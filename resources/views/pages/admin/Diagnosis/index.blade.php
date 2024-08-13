@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Lakukan Diagnosa')

@section('content')
<div>
    <div class="w-full mt-12">
        <div class="bg-white overflow-auto">
            <!-- Form untuk Melakukan Diagnosis -->
            <form action="{{ route('Process-Diagnosis') }}" method="POST" class="p-10 bg-white rounded-lg shadow-xl">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="nama-peternak">Nama Peternak</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="nama-peternak"
                        name="nama_peternak"
                        type="text"
                        required
                        placeholder="Nama Peternak"
                        aria-label="Nama Peternak"
                        {{-- value="{{ old('nama_peternak') }}" --}}
                    >
                    @error('nama_peternak')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-600" for="tanggal-diagnosa">Tanggal Diagnosa</label>
                    <input
                        class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        id="tanggal-diagnosa"
                        name="tanggal_diagnosa"
                        type="date"
                        required
                        aria-label="Tanggal Diagnosa"
                        {{-- value="{{ old('tanggal_diagnosa') }}" --}}
                    >
                    @error('tanggal_diagnosa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-600">Pilih Gejala</label>
                    <div class="flex flex-wrap">
                        @foreach ($gejalas as $gejala)
                            <div class="w-full sm:w-1/2 lg:w-1/3 p-2">
                                <label class="inline-flex items-center">
                                    <input
                                        type="checkbox"
                                        name="gejala[]"
                                        value="{{ $gejala->id }}"
                                        class="form-checkbox text-blue-500"
                                    >
                                    <span class="ml-2 text-gray-700">{{ $gejala->NamaGejala }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('gejala')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button class="px-6 py-2 text-white font-light tracking-wider bg-blue-500 hover:bg-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" type="submit">Lakukan Diagnosis</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
