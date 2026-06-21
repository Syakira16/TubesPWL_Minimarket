@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Tambah Kategori
</h2>

<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="mb-4">
        <label>Kode Kategori</label>
        <input type="text"
               name="kode_kategori"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Nama Kategori</label>
        <input type="text"
               name="nama_kategori"
               class="w-full border rounded p-2">
    </div>

    <button
        class="bg-blue-500 text-white px-4 py-2 rounded">

        Simpan

    </button>

</form>

@endsection
