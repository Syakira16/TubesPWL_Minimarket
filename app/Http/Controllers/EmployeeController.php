<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Branch;


class EmployeeController extends Controller
{
    public function index()
{
$employees = Employee::with('branch')->get();

return view(
'employees.index',
compact('employees')
);
}

public function create()
{
$branches = Branch::all();

return view(
'employees.create',
compact('branches')
);
}

public function store(Request $request)
{
$request->validate([
'kode_pegawai' => 'required|unique:employees',
'kode_cabang' => 'required',
'nama_pegawai' => 'required',
'jenis_kelamin' => 'required',
]);

Employee::create($request->all());

return redirect()
->route('employees.index')
->with('success', 'Pegawai berhasil ditambahkan');
}

public function edit(string $kode_pegawai)
{
$employee = Employee::findOrFail($kode_pegawai);

$branches = Branch::all();

return view(
'employees.edit',
compact('employee', 'branches')
);
}

public function update(
Request $request,
string $kode_pegawai
) {
$employee = Employee::findOrFail($kode_pegawai);

$employee->update($request->all());

return redirect()
->route('employees.index')
->with('success', 'Pegawai berhasil diubah');
}

public function destroy(string $kode_pegawai)
{
Employee::findOrFail($kode_pegawai)
->delete();

return redirect()
->route('employees.index')
->with('success', 'Pegawai berhasil dihapus');
}

}
