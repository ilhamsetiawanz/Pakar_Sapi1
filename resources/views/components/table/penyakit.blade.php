
    <div>
        <div class="w-full mt-12 p-6">
            <div class="bg-white overflow-auto">
                <!-- Header dengan Search Bar dan Tombol Tambah Data -->
                <div class="flex justify-between items-center mb-4 px-6 py-5">
                    <div class="flex items-center">
                        <input type="text" placeholder="Cari Gejala..." class="border rounded px-4 py-2" />
                    </div>
                    <a href="{{ route ('Tambah-Penyakit')}}">
                        <button class="flex items-center gap-1 rounded-lg bg-green-500 py-2 px-3 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                            <span class="xl:block hidden text-xs">Tambah Data</span>
                            <span class="material-icons text-xs">add</span> <!-- Icon hanya muncul di mode desktop -->
    
                        </button>
                    </a>
                </div>
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Kode Penyakit</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Penyakit</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gambar Penyakit</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyakit as $item)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{$item->KodePenyakit}}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{$item->Penyakit}}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <img class="w-40" src="{{$item->image}}" alt="{{$item->Penyakit}}">
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light flex items-center">
                                <a href=" {{ route('Edit-Penyakit', ['penyakit' => $item->id]) }} ">
                                    <button class="flex items-center gap-1 mr-2 rounded-lg bg-blue-500 py-2 px-3 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                                        <span class="material-icons md:hidden">edit</span>
                                        <span class="xl:block hidden text-xs">Edit</span>
                                    </button>
                                </a>
                                <a href="">
                                    <button class=" flex items-center gap-1 rounded-lg bg-red-500 py-2 px-3 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                                        <span class="material-icons text-xs">delete</span>
                                        <span class="xl:block hidden text-xs">Hapus</span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
