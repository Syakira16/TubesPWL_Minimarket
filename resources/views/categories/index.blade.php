@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>
        <h2 class="text-2xl font-bold">
            Data Kategori
        </h2>
    </div>

    <a href="{{ route('categories.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">

        + Tambah Kategori

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
            <th class="border p-3">No</th>
            <th class="border p-3">Kode Kategori</th>
            <th class="border p-3">Nama Kategori</th>
            <th class="border p-3">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($categories as $category)

        <tr>

            <td class="border p-3 text-center">
                {{ $loop->iteration }}
            </td>

            <td class="border p-3">
                {{ $category->kode_kategori }}
            </td>

            <td class="border p-3">
                {{ $category->nama_kategori }}
            </td>

            <td class="border p-3">

                <div class="flex gap-2">

                    <a href="{{ route('categories.edit', $category->kode_kategori) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">

                        Edit

                    </a>

                    <form action="{{ route('categories.destroy', $category->kode_kategori) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Yakin hapus data?')"
                            class="bg-red-500 text-white px-3 py-1 rounded">

                            Hapus

                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4" class="text-center p-4">
                Data kategori belum tersedia
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection
