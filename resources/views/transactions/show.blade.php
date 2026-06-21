@extends('layouts.app')

@section('title','Detail Transaksi')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Detail Transaksi
</h2>

<div class="bg-white shadow rounded p-5 mb-5">

    <table>

        <tr>
            <td width="180">No Transaksi</td>
            <td>: {{ $transaction->no_transaksi }}</td>
        </tr>

        <tr>
            <td>Tanggal</td>
            <td>: {{ $transaction->tanggal_transaksi }}</td>
        </tr>

        <tr>
            <td>Pegawai</td>
            <td>: {{ $transaction->employee->nama_pegawai }}</td>
        </tr>

        <tr>
            <td>Cabang</td>
            <td>: {{ $transaction->branch->nama_cabang }}</td>
        </tr>

    </table>

</div>

<div class="bg-white shadow rounded p-5">

    <table class="w-full border">

        <thead class="bg-gray-100">

            <tr>

                <th class="border p-2">
                    Produk
                </th>

                <th class="border p-2">
                    Harga
                </th>

                <th class="border p-2">
                    Qty
                </th>

                <th class="border p-2">
                    Subtotal
                </th>

            </tr>

        </thead>

        <tbody>

        @foreach($transaction->details as $detail)

            <tr>

                <td class="border p-2">
                    {{ $detail->product->nama_barang }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($detail->harga,0,',','.') }}
                </td>

                <td class="border p-2">
                    {{ $detail->jumlah }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($detail->subtotal,0,',','.') }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <div class="mt-5 text-right">

        <h2 class="text-2xl font-bold">
            Total :
            Rp {{ number_format($transaction->total,0,',','.') }}
        </h2>

    </div>

</div>

@endsection
