{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Minimarket Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
<div class="flex min-h-screen">
    <aside class="w-64 bg-slate-900 text-white">

    <div class="p-5 border-b border-slate-700">

        <h1 class="text-xl font-bold">
            🏪 Minimarket
        </h1>

        <p class="text-sm text-gray-300">
            Management System
        </p>

    </div>

    <nav class="mt-4">

        <a href="{{ route('dashboard') }}"
           class="block px-5 py-3 hover:bg-slate-700">
            Dashboard
        </a>

        <a href="{{ route('branches.index') }}"
           class="block px-5 py-3 hover:bg-slate-700">
            Cabang
        </a>

        <a href="{{ route('categories.index') }}"
           class="block px-5 py-3 hover:bg-slate-700">
            Kategori
        </a>

        <a href="{{ route('products.index') }}"
           class="block px-5 py-3 hover:bg-slate-700">
            Produk
        </a>

        <a href="{{ route('employees.index') }}"
           class="block px-5 py-3 hover:bg-slate-700">
            Pegawai
        </a>
    </nav>
</aside>

    <main class="flex-1">
        <header class="bg-white shadow px-6 py-4 flex justify-between">
            <div>
                <h1 class="font-bold text-2xl">
                    Dashboard
                </h1>

                <p class="text-gray-500">
                    Sistem Informasi Minimarket
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div>
                    <p class="font-semibold">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ auth()->user()->roles->pluck('name')->first() }}
                    </p>
                </div>
            </div>
        </header>

        <div class="p-6">
            @yield('content')
        </div>

    </main>
</div>

</body>
</html>
