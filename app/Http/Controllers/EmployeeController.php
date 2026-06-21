<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Branch;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('branch')->get();

        return view(
            'employess.index',
            compact('employees')
        );
    }

    public function create()
    {
        $branches = Branch::all();

        return view(
            'employess.create',
            compact('branches')
        );
    }

    public function store(Request $request)
    {
        Employee::create([
            'kode_pegawai' => $request->kode_pegawai,
            'kode_cabang' => $request->kode_cabang,
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('employess.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($kode_pegawai)
    {
        $employee = Employee::findOrFail($kode_pegawai);

        $branches = Branch::all();

        return view(
            'employess.edit',
            compact('employee', 'branches')
        );
    }

    public function update(Request $request, $kode_pegawai)
    {
        $employee = Employee::findOrFail($kode_pegawai);

        $employee->update([
            'kode_cabang' => $request->kode_cabang,
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('employess.index')
            ->with('success', 'Pegawai berhasil diupdate');
    }

    public function destroy($kode_pegawai)
    {
        $employee = Employee::findOrFail($kode_pegawai);

        $employee->delete();

        return redirect()
            ->route('employess.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}
