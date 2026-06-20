@extends('layouts.app')

@section('title', 'Edit Cabang')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Edit Cabang
</h2>

<form action="{{ route('branches.update', $branch->kode_cabang) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Kode Cabang</label>
        <input type="text"
               value="{{ $branch->kode_cabang }}"
               readonly
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Nama Cabang</label>
        <input type="text"
               name="nama_cabang"
               value="{{ $branch->nama_cabang }}"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Alamat</label>
        <textarea name="alamat"
                  class="w-full border rounded p-2">{{ $branch->alamat }}</textarea>
    </div>

    <div class="mb-4">
        <label>Kota</label>
        <input type="text"
               name="kota"
               value="{{ $branch->kota }}"
               class="w-full border rounded p-2">
    </div>

    <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

@endsection
