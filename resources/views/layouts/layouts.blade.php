<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="{{ route('Home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Sistem</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            @if (Auth::user()->role == 'admin')
                {{-- <p>Anda login sebagai Admin</p> --}}
                <a href="{{ route('Home') }}" class="flex items-center {{ Request::is('Home') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('Gejala') }}" class="flex items-center {{ Request::is('Gejala') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">note</span>
                    Data Gejala
                </a>
                <a href="{{ route('Penyakit') }}" class="flex items-center {{ Request::is('Penyakit') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">note</span>
                    Data Penyakit
                </a>
                <a href="{{ route('Diagnosis') }}" class="flex items-center {{ Request::is('Diagnosis') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">healing</span>
                    Diagnosa
                </a>
                <a href="{{ route('Laporan-Bulanan') }}" class="flex items-center {{ Request::is('Laporan-Bulanan') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">insert_chart</span>
                    Laporan Bulanan
                </a>
            @else
                {{-- <p>Anda bukan Admin</p> --}}
                <a href="{{ route('Diagnosis') }}" class="flex items-center {{ Request::is('Diagnosis') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">healing</span>
                    Diagnosa
                </a>
                <a href="{{ route('Laporan-Bulanan') }}" class="flex items-center {{ Request::is('Laporan-Bulanan') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-4 pl-6 nav-item">
                    <span class="material-icons mr-3">insert_chart</span>
                    Laporan Bulanan
                </a>
            @endif
        </nav>
    </aside>
    

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400" alt="Profile Picture">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <span x-show="!isOpen" class="material-icons">menu</span>
                    <span x-show="isOpen" class="material-icons">close</span>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                @if (Auth::user()->role == 'admin')
                    {{-- <p>Anda login sebagai Admin</p> --}}
                    <a href="{{ route('Home') }}" class="flex items-center {{ Request::is('Home') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">dashboard</span>
                        Dashboard
                    </a>
                    <a href="{{ route('Gejala') }}" class="flex items-center {{ Request::is('Gejala') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">note</span>
                        Data Gejala
                    </a>
                    <a href="{{ route('Penyakit') }}" class="flex items-center {{ Request::is('Penyakit') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">note</span>
                        Data Penyakit
                    </a>
                    <a href="{{ route('Diagnosis') }}" class="flex items-center {{ Request::is('Diagnosis') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">healing</span>
                        Diagnosa
                    </a>
                    <a href="{{ route('Laporan-Bulanan') }}" class="flex items-center {{ Request::is('Laporan-Bulanan') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">insert_chart</span>
                        Laporan Bulanan
                    </a>
                @else
                    {{-- <p>Anda bukan Admin</p> --}}
                    <a href="{{ route('Diagnosis') }}" class="flex items-center {{ Request::is('Diagnosis') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">healing</span>
                        Diagnosa
                    </a>
                    <a href="{{ route('Laporan-Bulanan') }}" class="flex items-center {{ Request::is('Laporan-Bulanan') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} py-2 pl-4 nav-item">
                        <span class="material-icons mr-3">insert_chart</span>
                        Laporan Bulanan
                    </a>
                @endif
            </nav>
        </header>

    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">@yield('pageName')</h1>

                @yield('content')
            </main>
    
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">Sistem Pakar</a>.
            </footer>
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    
</body>
</html>
