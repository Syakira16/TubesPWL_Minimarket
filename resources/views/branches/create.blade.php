@extends('layouts.app')

@section('title', 'Tambah Cabang')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Tambah Cabang
</h2>

<form action="{{ route('branches.store') }}" method="POST">

    @csrf

    <div class="mb-4">
        <label>Kode Cabang</label>
        <input type="text"
               name="kode_cabang"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Nama Cabang</label>
        <input type="text"
               name="nama_cabang"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Alamat</label>
        <textarea name="alamat"
                  class="w-full border rounded p-2"></textarea>
    </div>

    <div class="mb-4">
        <label>Kota</label>
        <input type="text"
               name="kota"
               class="w-full border rounded p-2">
    </div>

    <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection
