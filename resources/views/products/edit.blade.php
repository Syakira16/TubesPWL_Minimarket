@extends('layouts.app')

@section('title','Edit Produk')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Edit Produk
</h2>

<form
    action="{{ route('products.update',$product->kode_barang) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label>Kode Barang</label>

        <input
            type="text"
            value="{{ $product->kode_barang }}"
            readonly
            class="w-full border rounded p-2 bg-gray-100">

    </div>

    <div class="mb-4">

        <label>Kategori</label>

        <select
            name="kode_kategori"
            class="w-full border rounded p-2">

            @foreach($categories as $category)

            <option
                value="{{ $category->kode_kategori }}"
                {{ $product->kode_kategori == $category->kode_kategori ? 'selected' : '' }}>

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
            value="{{ $product->nama_barang }}"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Harga</label>

        <input
            type="number"
            name="harga"
            value="{{ $product->harga }}"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Stok</label>

        <input
            type="number"
            name="stok"
            value="{{ $product->stok }}"
            class="w-full border rounded p-2">

    </div>

    <button
        type="submit"
        class="bg-green-500 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

@endsection
