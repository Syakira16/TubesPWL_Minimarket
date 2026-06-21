<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockIn;


class StockInController extends Controller
{
    public function index()
{
    $stockIns = StockIn::with('product')
        ->latest()
        ->get();

    return view(
      'stock-ins.index',
      compact('stockIns')
      );
}

public function create()
{
    $products = Product::all();

    return view(
      'stock-ins.create',
      compact('products')
      );  
}

public function store(Request $request)
{
    StockIn::create([
      'kode_barang' => $request->kode_barang,
      'jumlah' => $request->jumlah,
      'tanggal' => $request->tanggal
    ]);

    $product = Product::findOrFail(
    $request->kode_barang
);

    $product->stok += $request->jumlah;

    $product->save();

    return redirect()
      ->route('stock-ins.index')
      ->with(
      'success',
      'Barang masuk berhasil'
    );
}

}
