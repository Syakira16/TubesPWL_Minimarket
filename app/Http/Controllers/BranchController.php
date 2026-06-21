<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();

        return view('branches.index', compact('branches'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
        'kode_cabang' => 'required|unique:branches,kode_cabang',
        'nama_cabang' => 'required',
        'alamat' => 'required',
        'kota' => 'required',
    ]);

    Branch::create([
        'kode_cabang' => $request->kode_cabang,
        'nama_cabang' => $request->nama_cabang,
        'alamat' => $request->alamat,
        'kota' => $request->kota,
    ]);

    return redirect()
        ->route('branches.index')
        ->with('success', 'Cabang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($kode_cabang)
    { 
    $branch = Branch::findOrFail($kode_cabang);

    return view('branches.edit', compact('branch'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_cabang)
{
    $branch = Branch::findOrFail($kode_cabang);

    $branch->update([
        'nama_cabang' => $request->nama_cabang,
        'alamat' => $request->alamat,
        'kota' => $request->kota,
    ]);

    return redirect()
        ->route('branches.index')
        ->with('success', 'Data berhasil diubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_cabang)
{
    Branch::findOrFail($kode_cabang)->delete();

    return redirect()
        ->route('branches.index')
        ->with('success', 'Data berhasil dihapus');
}

}
