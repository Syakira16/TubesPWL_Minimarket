@extends('layouts.app')
@section('title','Transaksi Baru')
@section('content')

<h2 class="text-2xl font-bold mb-6">
    Transaksi Penjualan
</h2>

@if(session('error'))
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<div class="bg-white shadow rounded p-5 mb-6">

    <form action="{{ route('transactions.add-cart') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="font-semibold">
                    Produk
                </label>

                <select
                    name="kode_barang"
                    class="w-full border rounded p-2"
                    required>

                    <option value="">
                        Pilih Produk
                    </option>

                    @foreach($products as $product)

                    <option value="{{ $product->kode_barang }}">
                        {{ $product->nama_barang }}
                        (Stok : {{ $product->stok }})
                    </option>

                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Jumlah
                </label>

                <input
                    type="number"
                    min="1"
                    name="jumlah"
                    class="w-full border rounded p-2"
                    required>
            </div>

        </div>

        <button
            type="submit"
            class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Ke Keranjang
        </button>

    </form>

</div>

<div class="bg-white shadow rounded p-5">

    <h3 class="text-xl font-bold mb-4">
        Keranjang Belanja
    </h3>

    <table class="w-full border">

        <thead class="bg-gray-100">

            <tr>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Qty</th>
                <th class="border p-2">Subtotal</th>
                <th class="border p-2">Aksi</th>
            </tr>

        </thead>

        <tbody>

        @php
            $grandTotal = 0;
        @endphp

        @forelse($cart as $index => $item)

            @php
                $grandTotal += $item['subtotal'];
            @endphp

            <tr>

                <td class="border p-2">
                    {{ $item['nama_barang'] }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($item['harga'],0,',','.') }}
                </td>

                <td class="border p-2">
                    {{ $item['jumlah'] }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($item['subtotal'],0,',','.') }}
                </td>

                <td class="border p-2">

                    <a
                        href="{{ route('transactions.remove-cart',$index) }}"
                        class="bg-red-500 text-white px-3 py-1 rounded">
                        Hapus
                    </a>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5"
                    class="text-center p-4">
                    Keranjang masih kosong
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="mt-4 text-right">

        <h3 class="text-2xl font-bold">
            Total :
            Rp {{ number_format($grandTotal,0,',','.') }}
        </h3>

    </div>

</div>

<div class="bg-white shadow rounded p-5 mt-6">

    <form
        action="{{ route('transactions.store') }}"
        method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">

            <div>

                <label>No Transaksi</label>

                <input
                    type="text"
                    name="no_transaksi"
                    value="TRX{{ date('YmdHis') }}"
                    readonly
                    class="w-full border rounded p-2">

            </div>

            <div>

                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal_transaksi"
                    value="{{ date('Y-m-d') }}"
                    class="w-full border rounded p-2">

            </div>

            <div>

                <label>Pegawai</label>

                <select
                    name="kode_pegawai"
                    class="w-full border rounded p-2">

                    @foreach($employees as $employee)

                    <option value="{{ $employee->kode_pegawai }}">
                        {{ $employee->nama_pegawai }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div>

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

        </div>

        <button
            type="submit"
            class="mt-5 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
            Simpan Transaksi
        </button>

    </form>

</div>

@endsection
