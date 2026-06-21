@extends('layouts.app')
@section('title', 'Barang Masuk')
@section('content')

<div class="flex justify-between items-center mb-5">

    <h2 class="text-2xl font-bold">
        Data Barang Masuk
    </h2>

    <a href="{{ route('stock-ins.create') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        + Barang Masuk
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
            <th class="border p-2">No</th>
            <th class="border p-2">Produk</th>
            <th class="border p-2">Jumlah</th>
            <th class="border p-2">Tanggal</th>
        </tr>

    </thead>

    <tbody>
        @forelse($stockIns as $index => $stock)
        <tr>

            <td class="border p-2">
                {{ $index + 1 }}
            </td>

            <td class="border p-2">
                {{ $stock->product->nama_barang }}
            </td>

            <td class="border p-2">
                {{ $stock->jumlah }}
            </td>

            <td class="border p-2">
                {{ $stock->tanggal }}
            </td>

        </tr>

        @empty

        <tr>

            <td colspan="4"
                class="text-center p-3">
                Belum ada data barang masuk
            </td>

        </tr>
        @endforelse
    </tbody>

</table>

@endsection
