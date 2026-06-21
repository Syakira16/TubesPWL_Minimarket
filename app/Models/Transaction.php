<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  
    protected $fillable = [
        'no_transaksi',
        'kode_pegawai',
        'kode_cabang',
        'tanggal_transaksi',
        'total'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'kode_cabang','kode_cabang');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'kode_pegawai', 'kode_pegawai');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

}
