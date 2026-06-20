@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Selamat Datang, {{ auth()->user()->name }}
</h2>

@if(auth()->user()->hasRole('Owner'))

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

    <div class="bg-blue-500 text-white rounded-xl p-6 shadow">
        <h3 class="text-sm">Total Cabang</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalCabang }}
        </p>
    </div>

    <div class="bg-green-500 text-white rounded-xl p-6 shadow">
        <h3 class="text-sm">Total Produk</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalProduk }}
        </p>
    </div>

    <div class="bg-yellow-500 text-white rounded-xl p-6 shadow">
        <h3 class="text-sm">Total Kategori</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalKategori }}
        </p>
    </div>

    <div class="bg-purple-500 text-white rounded-xl p-6 shadow">
        <h3 class="text-sm">Total Pegawai</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalPegawai }}
        </p>
    </div>

    <div class="bg-red-500 text-white rounded-xl p-6 shadow">
        <h3 class="text-sm">Total Transaksi</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalTransaksi }}
        </p>
    </div>
</div>

<div class="mt-10">

    <h3 class="text-xl font-bold mb-4">
        Cabang Terbaru
    </h3>

    <div class="overflow-x-auto">
        <table class="w-full border">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3">Kode Cabang</th>
                    <th class="border p-3">Nama Cabang</th>
                    <th class="border p-3">Kota</th>
                </tr>
            </thead>

            <tbody>

                @forelse($latestBranches as $branch)

                <tr>
                    <td class="border p-3">
                        {{ $branch->kode_cabang }}
                    </td>

                    <td class="border p-3">
                        {{ $branch->nama_cabang }}
                    </td>

                    <td class="border p-3">
                        {{ $branch->kota }}
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="3" class="border p-3 text-center">
                        Belum ada data cabang
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-10">
    <h3 class="text-xl font-bold mb-4">
        Produk Terbaru
    </h3>

    <div class="overflow-x-auto">
        <table class="w-full border">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3">Kode Barang</th>
                    <th class="border p-3">Nama Produk</th>
                    <th class="border p-3">Stok</th>
                </tr>
            </thead>

            <tbody>

                @forelse($latestProducts as $product)

                <tr>
                    <td class="border p-3">
                        {{ $product->kode_barang }}
                    </td>

                    <td class="border p-3">
                        {{ $product->nama_barang }}
                    </td>

                    <td class="border p-3">
                        {{ $product->stok }}
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="3" class="border p-3 text-center">
                        Belum ada data produk
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endif

@endsection