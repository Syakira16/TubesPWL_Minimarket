@extends('layouts.app')
@section('title', 'Tambah Barang Keluar')
@section('content')

<h2 class="text-2xl font-bold mb-5">
    Tambah Barang Keluar
</h2>

<form action="{{ route('stock-outs.store') }}"
      method="POST">

    @csrf

    <div class="mb-4">

        <label class="block mb-2">
            Produk
        </label>

        <select
            name="kode_barang"
            class="w-full border rounded p-2"
            required>

            <option value="">
                Pilih Produk
            </option>

            @foreach($products as $product)

            <option value="{{ $product->kode_barang }}">
                {{ $product->nama_barang }}
                (Stok : {{ $product->stok }})
            </option>

            @endforeach
        </select>

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Jumlah Keluar
        </label>

        <input
            type="number"
            min="1"
            name="jumlah"
            class="w-full border rounded p-2"
            required>

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Tanggal
        </label>

        <input
            type="date"
            name="tanggal"
            value="{{ date('Y-m-d') }}"
            class="w-full border rounded p-2"
            required>

    </div>

    <button
        type="submit"
        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded">
        Simpan
    </button>

    <a href="{{ route('stock-outs.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
        Kembali
    </a>
</form>

@endsection
