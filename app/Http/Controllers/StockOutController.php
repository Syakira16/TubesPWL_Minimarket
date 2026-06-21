<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockOut;


class StockOutController extends Controller
{
  public function index()
{
    $stockOuts = StockOut::with('product')
      ->latest()
      ->get();

    return view(
      'stock-outs.index',
      compact('stockOuts')
      );
}

  public function create()
{
    $products = Product::all();

    return view(
      'stock-outs.create',
      compact('products')
  );
}

  public function store(Request $request)
{
    $product = Product::findOrFail(
    $request->kode_barang
);

  if (
      $request->jumlah >
      $product->stok
    ) {
  return back()->with(
      'error',
      'Stok tidak mencukupi'
      );
}

  StockOut::create([
    'kode_barang' => $request->kode_barang,
    'jumlah' => $request->jumlah,
    'tanggal' => $request->tanggal
  ]);

  $product->stok -= $request->jumlah;

  $product->save();

  return redirect()
    ->route('stock-outs.index')
    ->with(
    'success',
    'Barang keluar berhasil'
    );
}

}
