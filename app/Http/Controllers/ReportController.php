<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;


class ReportController extends Controller
{
    public function sales(Request $request)
{
      $query = Transaction::query();

    if ($request->tanggal_awal && $request->tanggal_akhir)
{
      $query->whereBetween(
        'tanggal_transaksi',
      [
        $request->tanggal_awal,
        $request->tanggal_akhir
      ]
    );
}

      $transactions = $query
        ->latest()
        ->get();

      $totalTransaksi =
      $transactions->count();

      $totalPendapatan =
      $transactions->sum('total');

      return view(
          'reports.sales',
      compact(
          'transactions',
          'totalTransaksi',
          'totalPendapatan'
        )
      );
}

public function stock()
{
      $products = Product::all();

      $lowStocks = Product::where(
          'stok',
          '<',
          10
      )->get();

    return view(
      'reports.stock',
    compact(
      'products',
      'lowStocks'
    )
  );
}

}
