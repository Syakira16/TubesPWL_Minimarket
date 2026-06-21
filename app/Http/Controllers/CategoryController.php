<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'kode_kategori' => 'required|unique:categories,kode_kategori',
        'nama_kategori' => 'required'
]);

        Category::create([
        'kode_kategori' => $request->kode_kategori,
        'nama_kategori' => $request->nama_kategori,
]);

        return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil ditambahkan');


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
    public function edit(string $kode_kategori)
{
    $category = Category::findOrFail($kode_kategori);

    return view('categories.edit', compact('category'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_kategori)
{
    $category = Category::findOrFail($kode_kategori);

    $category->update([
    'nama_kategori' => $request->nama_kategori
]);

    return redirect()
    ->route('categories.index')
    ->with('success', 'Kategori berhasil diubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_kategori)
{
    Category::findOrFail($kode_kategori)->delete();

    return redirect()
    ->route('categories.index')
    ->with('success', 'Kategori berhasil dihapus');
}

}
