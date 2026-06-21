@extends('layouts.app')
@section('title','Laporan Penjualan')
@section('content')

<h2 class="text-2xl font-bold mb-5">
    Laporan Penjualan
</h2>

<form method="GET"
      action="{{ route('reports.sales') }}"
      class="grid grid-cols-3 gap-4 mb-6">

    <input
        type="date"
        name="tanggal_awal"
        class="border rounded p-2">

    <input
        type="date"
        name="tanggal_akhir"
        class="border rounded p-2">

    <button
        class="bg-blue-500 text-white rounded">
        Filter
    </button>

</form>

<div class="grid grid-cols-2 gap-4 mb-6">

    <div class="bg-blue-500 text-white p-5 rounded-xl">

        <h3>Total Transaksi</h3>
        <p class="text-4xl font-bold">
            {{ $totalTransaksi }}
        </p>

    </div>

    <div class="bg-green-500 text-white p-5 rounded-xl">
        <h3>Total Pendapatan</h3>
        <p class="text-4xl font-bold">
            Rp {{ number_format($totalPendapatan,0,',','.') }}
        </p>

    </div>
</div>

<table class="w-full border">

    <thead class="bg-gray-100">

        <tr>
            <th class="border p-2">
                No Transaksi
            </th>
            <th class="border p-2">
                Tanggal
            </th>
            <th class="border p-2">
                Total
            </th>
        </tr>

    </thead>

    <tbody>

        @foreach($transactions as $trx)

        <tr>
            <td class="border p-2">
                {{ $trx->no_transaksi }}
            </td>

            <td class="border p-2">
                {{ $trx->tanggal_transaksi }}
            </td>

            <td class="border p-2">
                Rp {{ number_format($trx->total,0,',','.') }}
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection
