<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with([
    'employee',
    'branch'
    ])->latest()->get();

    return view(
    'transactions.index',
    compact('transactions')
    );
}

public function create()
{
    $products = Product::all();
    $employees = Employee::all();
    $branches = Branch::all();

    $cart = session()->get('cart', []);

    return view(
    'transactions.create',
    compact(
    'products',
    'employees',
    'branches',
    'cart'
    ));
}

public function addToCart(Request $request)
{
    $product = Product::findOrFail(
    $request->kode_barang
    );

    $cart = session()->get('cart', []);

    $cart[] = [
    'kode_barang' => $product->kode_barang,
    'nama_barang' => $product->nama_barang,
    'harga' => $product->harga_jual,
    'jumlah' => $request->jumlah,
    'subtotal' =>
    $product->harga_jual *
    $request->jumlah
    ];

    session()->put('cart', $cart);

    return redirect()
    ->route('transactions.create');
}

public function removeCart($index)
{
    $cart = session()->get('cart', []);

    unset($cart[$index]);

    session()->put(
    'cart',
    array_values($cart)
    );

    return redirect()
    ->route('transactions.create');
}

public function store(Request $request)
{
    DB::beginTransaction();

    try {

    $cart = session()->get('cart', []);

    if (count($cart) == 0)
    {
    return back()->with(
    'error',
    'Keranjang masih kosong'
    );
  }

    $grandTotal = 0;

    foreach ($cart as $item)
    {
    $grandTotal +=
    $item['subtotal'];
    }

    $transaction = Transaction::create([
        'no_transaksi' => $request->no_transaksi,
        'kode_pegawai' => $request->kode_pegawai,
        'kode_cabang' => $request->kode_cabang,
        'tanggal_transaksi' => $request->tanggal_transaksi,
        'total' => $grandTotal
    ]);

    foreach ($cart as $item)
  {
    TransactionDetail::create([
        'transaction_id' => $transaction->id,
        'kode_barang' => $item['kode_barang'],
        'qty' => $item['jumlah'],
        'harga' => $item['harga'],
        'subtotal' => $item['subtotal']
    ]);

    $product = Product::findOrFail(
    $item['kode_barang']
    );

    $product->stok =
    $product->stok -
    $item['jumlah'];

    $product->save();
  }

    session()->forget('cart');

    DB::commit();

    return redirect()
    ->route('transactions.index')
    ->with(
    'success',
    'Transaksi berhasil disimpan'
    );

    } catch (\Exception $e) {

    DB::rollBack();

    return back()->with(
    'error',
    $e->getMessage()
    );
    }
}

public function show($id)
{
    $transaction = Transaction::with([
    'employee',
    'branch',
    'details.product'
    ])->findOrFail($id);

    return view(
    'transactions.show',
    compact('transaction')
    );
}

}
