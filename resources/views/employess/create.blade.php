@extends('layouts.app')

@section('title','Tambah Pegawai')

@section('content')

<form action="{{ route('employees.store') }}"
      method="POST">

    @csrf

    <div class="mb-4">
        <label>Kode Pegawai</label>
        <input type="text"
               name="kode_pegawai"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Cabang</label>

        <select
            name="kode_cabang"
            class="w-full border rounded p-2">

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
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">

        <label>Jenis Kelamin</label>

        <select
            name="jenis_kelamin"
            class="w-full border rounded p-2">

            <option value="L">
                Laki-Laki
            </option>

            <option value="P">
                Perempuan
            </option>

        </select>

    </div>

    <div class="mb-4">

        <label>No Telepon</label>

        <input type="text"
               name="no_telp"
               class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Alamat</label>

        <textarea
            name="alamat"
            class="w-full border rounded p-2"></textarea>

    </div>

    <button
        class="bg-blue-500 text-white px-4 py-2 rounded">

        Simpan

    </button>

</form>

@endsection
