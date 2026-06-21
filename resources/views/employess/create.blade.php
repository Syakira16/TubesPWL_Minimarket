@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Tambah Pegawai
</h2>

<form action="{{ route('employess.store') }}"
      method="POST">

    @csrf

    <div class="mb-4">
        <label>Kode Pegawai</label>
        <input type="text"
               name="kode_pegawai"
               class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Cabang</label>

        <select name="kode_cabang"
                class="w-full border p-2 rounded">

            @foreach($branches as $branch)

            <option value="{{ $branch->kode_cabang }}">
                {{ $branch->nama_cabang }}
            </option>

            @endforeach

        </select>
    </div>

    <div class="mb-4">
        <label>Nama Pegawai</label>

        <input type="text"
               name="nama_pegawai"
               class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Jenis Kelamin</label>

        <select name="jenis_kelamin"
                class="w-full border p-2 rounded">

            <option value="Laki-Laki">
                Laki-Laki
            </option>

            <option value="Perempuan">
                Perempuan
            </option>

        </select>
    </div>

    <div class="mb-4">
        <label>No Telepon</label>

        <input type="text"
               name="no_telp"
               class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Alamat</label>

        <textarea
            name="alamat"
            class="w-full border p-2 rounded"></textarea>
    </div>

    <button
        class="bg-green-500 text-white px-4 py-2 rounded">

        Simpan

    </button>

</form>

@endsection
