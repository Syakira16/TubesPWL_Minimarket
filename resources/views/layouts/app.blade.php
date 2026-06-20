<!DOCTYPE html>
<html>
<head>
    <title>Minimarket Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 font-[Poppins]">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-slate-800 text-white flex flex-col shadow-2xl font-[Poppins]">
            <div class="px-6 py-5 border-b border-slate-700"> 
                <h1 class="text-xl font-bold tracking-wide"> 
                    🏪 Minimarket 
                </h1> 
                <p class="text-xs text-slate-300 mt-1"> Management System </p>
             </div>
            <nav class="flex-1 mt-5 px-3 text-sm">
                @php
                    $iconStyle = "w-5 h-5 opacity-90";
                @endphp

                <p class="px-4 text-xs uppercase text-slate-400 mb-2">
                    Main Menu
                </p>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-700 transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828765.png"
                        class="{{ $iconStyle }} invert"
                        alt="dashboard">
                    Dashboard
                </a>

                <div class="my-5 border-t border-slate-700"></div>

                <p class="px-4 text-xs uppercase text-slate-400 mb-2">
                    Master Data
                </p>

                <a href="{{ route('branches.index') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-700 transition">
                   <img src="https://cdn-icons-png.flaticon.com/512/2825/2825777.png"
                        class="{{ $iconStyle }} invert"
                        alt="branch">
                    Cabang
                </a>

                <a href="{{ route('categories.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-700 transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/11826/11826667.png"
                        class="{{ $iconStyle }} invert"
                        alt="category">
                    Kategori
                </a>

                <a href="{{ route('products.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-700 transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/1007/1007988.png"
                        class="{{ $iconStyle }} invert"
                        alt="product">
                    Produk
                </a>

                <a href="{{ route('employess.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-700 transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/1769/1769041.png"
                        class="{{ $iconStyle }} invert"
                        alt="employee">
                    Pegawai
                </a>

                <div class="my-5 border-t border-slate-700"></div>
                    <p class="px-4 text-xs uppercase text-slate-400 mb-2">
                        Laporan
                    </p>

                   <a href="{{ route('employess.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-700 transition">
                    <img src="https://cdn-icons-png.flaticon.com/512/10074/10074955.png"
                        class="{{ $iconStyle }} invert"
                        alt="sales-report">
                    Laporan Penjualan
                </a>
            </nav>
            <div class="border-t border-slate-700 p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                        {{ request()->routeIs('dashboard')
                            ? 'bg-blue-600 text-white'
                            : 'hover:bg-slate-700' }}">
                            {{-- class="w-full flex items-center justify-center gap-3 bg-slate-700 hover:bg-slate-600 text-white text-sm py-2 rounded-lg transition"> --}}
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png"
                            class="w-5 h-5 invert"
                            alt="logout">
                        Logout
                    </button>
                </form>
            </div>
        </aside>
    <main class="flex-1 flex flex-col">
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold text-gray-800">
                    @yield('title', 'Dashboard')
                </h1>

                <p class="text-sm text-gray-500">
                    {{ now()->format('d F Y') }}
                </p>
                <p class="text-sm text-gray-500">
                    Sistem Informasi Minimarket
                </p>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="font-semibold">
                        {{ auth()->user()->name }}
                    </p>

                    <span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-600">
                        {{ auth()->user()->roles->pluck('name')->first() }}
                    </span>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <div class="p-6 flex-1">
            <div class="bg-white rounded-xl shadow-sm p-6">
                @yield('content')
            </div>
        </div>
        <footer class="bg-white border-t border-gray-200 px-6 py-3 text-center text-sm text-gray-500">
            © {{ date('Y') }}
            Sistem Informasi Minimarket
        </footer>
    </main>
</div>

</body>
</html>