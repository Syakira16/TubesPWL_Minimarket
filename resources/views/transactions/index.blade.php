@extends('layouts.app')
@section('title','Data Transaksi')
@section('content')

<div class="flex justify-between mb-5">

    <h2 class="text-2xl font-bold">
        Data Transaksi
    </h2>

    <a href="{{ route('transactions.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
        Transaksi Baru
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
            <th class="border p-2">No Transaksi</th>
            <th class="border p-2">Tanggal</th>
            <th class="border p-2">Pegawai</th>
            <th class="border p-2">Cabang</th>
            <th class="border p-2">Total</th>
            <th class="border p-2">Aksi</th>
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
            {{ $trx->employee->nama_pegawai }}
        </td>

        <td class="border p-2">
            {{ $trx->branch->nama_cabang }}
        </td>

        <td class="border p-2">
            Rp {{ number_format($trx->total,0,',','.') }}
        </td>

        <td class="border p-2">

            <a href="{{ route('transactions.show',$trx->id) }}"
               class="bg-green-500 text-white px-3 py-1 rounded">
                Detail
            </a>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

@endsection
