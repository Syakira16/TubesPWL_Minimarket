@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Edit Pegawai
</h2>

<form action="{{ route('employess.update', $employee->kode_pegawai) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label>Kode Pegawai</label>

        <input
            type="text"
            value="{{ $employee->kode_pegawai }}"
            readonly
            class="w-full border p-2 rounded">

    </div>

    <div class="mb-4">

        <label>Cabang</label>

        <select
            name="kode_cabang"
            class="w-full border p-2 rounded">

            @foreach($branches as $branch)

            <option
                value="{{ $branch->kode_cabang }}"
                {{ $employee->kode_cabang == $branch->kode_cabang ? 'selected' : '' }}>

                {{ $branch->nama_cabang }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label>Nama Pegawai</label>

        <input
            type="text"
            name="nama_pegawai"
            value="{{ $employee->nama_pegawai }}"
            class="w-full border p-2 rounded">

    </div>

    <div class="mb-4">

        <label>Jenis Kelamin</label>

        <select
            name="jenis_kelamin"
            class="w-full border p-2 rounded">

            <option value="Laki-Laki"
                {{ $employee->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                Laki-Laki
            </option>

            <option value="Perempuan"
                {{ $employee->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                Perempuan
            </option>

        </select>

    </div>

    <div class="mb-4">

        <label>No Telepon</label>

        <input
            type="text"
            name="no_telp"
            value="{{ $employee->no_telp }}"
            class="w-full border p-2 rounded">

    </div>

    <div class="mb-4">

        <label>Alamat</label>

        <textarea
            name="alamat"
            class="w-full border p-2 rounded">{{ $employee->alamat }}</textarea>

    </div>

    <button
        class="bg-blue-500 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

@endsection
