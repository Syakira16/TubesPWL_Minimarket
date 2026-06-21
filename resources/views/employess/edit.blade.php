@extends('layouts.app')

@section('title','Edit Pegawai')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Edit Pegawai
</h2>

<form action="{{ route('employees.update', $employee->kode_pegawai) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-2">
            Kode Pegawai
        </label>

        <input
            type="text"
            value="{{ $employee->kode_pegawai }}"
            readonly
            class="w-full border rounded p-2 bg-gray-100">
    </div>

    <div class="mb-4">
        <label class="block mb-2">
            Cabang
        </label>

        <select
            name="kode_cabang"
            class="w-full border rounded p-2">

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

        <label class="block mb-2">
            Nama Pegawai
        </label>

        <input
            type="text"
            name="nama_pegawai"
            value="{{ $employee->nama_pegawai }}"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Jenis Kelamin
        </label>

        <select
            name="jenis_kelamin"
            class="w-full border rounded p-2">

            <option
                value="L"
                {{ $employee->jenis_kelamin == 'L' ? 'selected' : '' }}>
                Laki-Laki
            </option>

            <option
                value="P"
                {{ $employee->jenis_kelamin == 'P' ? 'selected' : '' }}>
                Perempuan
            </option>

        </select>

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            No Telepon
        </label>

        <input
            type="text"
            name="no_telp"
            value="{{ $employee->no_telp }}"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Alamat
        </label>

        <textarea
            name="alamat"
            class="w-full border rounded p-2">{{ $employee->alamat }}</textarea>

    </div>

    <button
        type="submit"
        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

@endsection
