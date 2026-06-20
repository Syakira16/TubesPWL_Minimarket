@extends('layouts.app')

@section('title', 'Data Cabang')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-bold">
        Data Cabang
    </h2>

    <a href="{{ route('branches.create') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        + Tambah Cabang
    </a>

</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">

    <table class="w-full border border-gray-300">

        <thead class="bg-gray-100">

            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">Kode Cabang</th>
                <th class="border p-3">Nama Cabang</th>
                <th class="border p-3">Alamat</th>
                <th class="border p-3">Kota</th>
                <th class="border p-3">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($branches as $branch)

            <tr>

                <td class="border p-3 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-3">
                    {{ $branch->kode_cabang }}
                </td>

                <td class="border p-3">
                    {{ $branch->nama_cabang }}
                </td>

                <td class="border p-3">
                    {{ $branch->alamat }}
                </td>

                <td class="border p-3">
                    {{ $branch->kota }}
                </td>

                <td class="border p-3">

                    <div class="flex gap-2">

                        <a href="{{ route('branches.edit', $branch->kode_cabang) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">

                            Edit

                        </a>

                        <form action="{{ route('branches.destroy', $branch->kode_cabang) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center p-4">
                    Data Cabang Belum Ada
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
