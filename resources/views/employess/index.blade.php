@extends('layouts.app')

@section('title','Data Pegawai')

@section('content')

<div class="flex justify-between mb-5">

    <h2 class="text-2xl font-bold">
        Data Pegawai
    </h2>

    <a href="{{ route('employees.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">

        Tambah Pegawai

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
            <th class="border p-3">Kode</th>
            <th class="border p-3">Cabang</th>
            <th class="border p-3">Nama</th>
            <th class="border p-3">JK</th>
            <th class="border p-3">No Telp</th>
            <th class="border p-3">Aksi</th>
        </tr>

    </thead>

    <tbody>

    @foreach($employees as $employee)

        <tr>

            <td class="border p-3">
                {{ $employee->kode_pegawai }}
            </td>

            <td class="border p-3">
                {{ $employee->branch->nama_cabang }}
            </td>

            <td class="border p-3">
                {{ $employee->nama_pegawai }}
            </td>

            <td class="border p-3">
                {{ $employee->jenis_kelamin }}
            </td>

            <td class="border p-3">
                {{ $employee->no_telp }}
            </td>

            <td class="border p-3">

                <div class="flex gap-2">

                    <a
                    href="{{ route('employees.edit',$employee->kode_pegawai) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded">

                        Edit

                    </a>

                    <form
                    action="{{ route('employees.destroy',$employee->kode_pegawai) }}"
                    method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                        onclick="return confirm('Yakin hapus?')"
                        class="bg-red-500 text-white px-3 py-1 rounded">

                            Hapus

                        </button>

                    </form>

                </div>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection
