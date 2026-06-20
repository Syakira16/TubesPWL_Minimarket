<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $products = Product::with('category')->get();

    return view('products.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();

    return view('products.create', compact('categories'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
    'kode_barang' => 'required|unique:products,kode_barang',
    'kode_kategori' => 'required',
    'nama_barang' => 'required',
    'harga' => 'required|numeric',
    'stok' => 'required|integer',
]);

Product::create($request->all());

    return redirect()
    ->route('products.index')
    ->with('success', 'Produk berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_barang)
{
    $product = Product::findOrFail($kode_barang);

    $categories = Category::all();

    return view(
    'products.edit',
    compact('product', 'categories')
);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(
Request $request,
string $kode_barang
) {
$product = Product::findOrFail($kode_barang);

$request->validate([
'kode_kategori' => 'required',
'nama_barang' => 'required',
'harga' => 'required|numeric',
'stok' => 'required|integer',
]);

$product->update([
'kode_kategori' => $request->kode_kategori,
'nama_barang' => $request->nama_barang,
'harga' => $request->harga,
'stok' => $request->stok,
]);

return redirect()
->route('products.index')
->with('success', 'Produk berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $kode_barang)
{
Product::findOrFail($kode_barang)->delete();

return redirect()
->route('products.index')
->with('success', 'Produk berhasil dihapus');
}

}
