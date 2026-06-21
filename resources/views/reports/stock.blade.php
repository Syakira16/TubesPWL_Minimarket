@extends('layouts.app')
@section('title','Laporan Stok')
@section('content')

<h2 class="text-2xl font-bold mb-5">
    Laporan Stok Barang
</h2>

<div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6">

    <h3 class="font-bold text-red-700">
        Barang Hampir Habis
    </h3>

    <ul class="mt-2">

        @forelse($lowStocks as $product)

            <li>
                {{ $product->nama_barang }}
                (Stok : {{ $product->stok }})
            </li>
        @empty
            <li>
                Tidak ada barang yang hampir habis
            </li>

        @endforelse

    </ul>

</div>

<table class="w-full border">

    <thead class="bg-gray-100">

        <tr>
            <th class="border p-2">
                Kode
            </th>

            <th class="border p-2">
                Nama Barang
            </th>

            <th class="border p-2">
                Harga
            </th>

            <th class="border p-2">
                Stok
            </th>
        </tr>

    </thead>

    <tbody>
        @foreach($products as $product)

        <tr>
            <td class="border p-2">
                {{ $product->kode_barang }}
            </td>

            <td class="border p-2">
                {{ $product->nama_barang }}
            </td>

            <td class="border p-2">
                Rp {{ number_format($product->harga_jual,0,',','.') }}
            </td>

            <td class="border p-2">
                {{ $product->stok }}
            </td>

        </tr>
        @endforeach
    </tbody>

</table>

@endsection
