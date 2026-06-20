@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Edit Kategori
</h2>

<form action="{{ route('categories.update', $category->kode_kategori) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Kode Kategori</label>
        <input type="text"
               value="{{ $category->kode_kategori }}"
               readonly
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Nama Kategori</label>
        <input type="text"
               name="nama_kategori"
               value="{{ $category->nama_kategori }}"
               class="w-full border rounded p-2">
    </div>

    <button
        class="bg-green-500 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

@endsection
