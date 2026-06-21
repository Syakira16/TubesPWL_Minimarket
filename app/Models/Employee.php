<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'kode_pegawai';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_pegawai',
        'kode_cabang',
        'nama_pegawai',
        'jenis_kelamin',
        'no_telp',
        'alamat'
    ];




    public function branch()
    {
        return $this->belongsTo(Branch::class, 'kode_cabang', 'kode_cabang');
    }
}
