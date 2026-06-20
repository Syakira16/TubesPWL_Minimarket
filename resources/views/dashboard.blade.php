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

@endif

@endsection