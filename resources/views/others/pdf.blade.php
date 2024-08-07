<table class="text-left w-full border-collapse">
    <thead>
        <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Kode Gejala</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Gejala</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gejalas as $item)
        <tr class="hover:bg-grey-lighter">
            <td class="py-4 px-6 border-b border-grey-light">{{$item->KodeGejala}}</td>
            <td class="py-4 px-6 border-b border-grey-light">{{$item->NamaGejala}}</td>
            <td class="py-4 px-6 border-b border-grey-light flex items-center">
                <button class="flex items-center gap-1 mr-2 rounded-lg bg-blue-500 py-2 px-3 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                    <span class="material-icons md:hidden">edit</span>
                    <span class="xl:block hidden text-xs">Edit</span>
                </button>
                <button class=" flex items-center gap-1 rounded-lg bg-red-500 py-2 px-3 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                    <span class="material-icons text-xs">delete</span>
                    <span class="xl:block hidden text-xs">Hapus</span>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>