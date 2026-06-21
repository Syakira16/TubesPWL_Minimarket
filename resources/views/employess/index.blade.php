@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')

<div class="flex justify-between items-center mb-5">

    <h2 class="text-2xl font-bold">
        Data Pegawai
    </h2>

    <a href="{{ route('employess.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">

        + Tambah Pegawai

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>

@endif

<table class="w-full border">

    <thead class="bg-gray-100">

        <tr>
            <th class="border p-2">Kode</th>
            <th class="border p-2">Cabang</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Jenis Kelamin</th>
            <th class="border p-2">No Telp</th>
            <th class="border p-2">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @foreach($employees as $employee)

        <tr>

            <td class="border p-2">
                {{ $employee->kode_pegawai }}
            </td>

            <td class="border p-2">
                {{ $employee->branch->nama_cabang ?? '-' }}
            </td>

            <td class="border p-2">
                {{ $employee->nama_pegawai }}
            </td>

            <td class="border p-2">
                {{ $employee->jenis_kelamin }}
            </td>

            <td class="border p-2">
                {{ $employee->no_telp }}
            </td>

            <td class="border p-2">

                <a href="{{ route('employess.edit', $employee->kode_pegawai) }}"
                   class="bg-yellow-500 text-white px-3 py-1 rounded">

                    Edit

                </a>

                <form
                    action="{{ route('employess.destroy', $employee->kode_pegawai) }}"
                    method="POST"
                    class="inline">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Yakin hapus data?')"
                        class="bg-red-500 text-white px-3 py-1 rounded">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection
