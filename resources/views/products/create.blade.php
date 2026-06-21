@extends('layouts.app')

@section('title','Tambah Produk')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Tambah Produk
</h2>

<form action="{{ route('products.store') }}"
      method="POST">

    @csrf

    <div class="mb-4">

        <label>Kode Barang</label>

        <input
            type="text"
            name="kode_barang"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Kategori</label>

        <select
            name="kode_kategori"
            class="w-full border rounded p-2">

            @foreach($categories as $category)

            <option value="{{ $category->kode_kategori }}">
                {{ $category->nama_kategori }}
            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label>Nama Produk</label>

        <input
            type="text"
            name="nama_barang"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Harga</label>

        <input
            type="number"
            name="harga"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Stok</label>

        <input
            type="number"
            name="stok"
            class="w-full border rounded p-2">

    </div>

    <button
        type="submit"
        class="bg-blue-500 text-white px-4 py-2 rounded">

        Simpan

    </button>

</form>

@endsection
