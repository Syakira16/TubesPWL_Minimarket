@extends('layouts.app')

@section('title','Data Produk')

@section('content')

<div class="flex justify-between mb-5">

    <h2 class="text-2xl font-bold">
        Data Produk
    </h2>

    <a href="{{ route('products.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">

        Tambah Produk

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
            <th class="border p-3">Kategori</th>
            <th class="border p-3">Nama Produk</th>
            <th class="border p-3">Harga</th>
            <th class="border p-3">Stok</th>
            <th class="border p-3">Aksi</th>
        </tr>

    </thead>

    <tbody>

    @foreach($products as $product)

        <tr>

            <td class="border p-3">
                {{ $product->kode_barang }}
            </td>

            <td class="border p-3">
                {{ $product->category->nama_kategori }}
            </td>

            <td class="border p-3">
                {{ $product->nama_barang }}
            </td>

            <td class="border p-3">
                Rp {{ number_format($product->harga,0,',','.') }}
            </td>

            <td class="border p-3">
                {{ $product->stok }}
            </td>

            <td class="border p-3">

                <div class="flex gap-2">

                    <a href="{{ route('products.edit',$product->kode_barang) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">

                        Edit

                    </a>

                    <form
                        action="{{ route('products.destroy',$product->kode_barang) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Yakin hapus data?')"
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
