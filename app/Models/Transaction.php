<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'kode_pegawai', 'kode_pegawai');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
