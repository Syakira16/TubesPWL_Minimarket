<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
protected $primaryKey = 'kode_cabang';
public $incrementing = false;
protected $keyType = 'string';

protected $fillable = [
    'kode_cabang',
    'nama_cabang',
    'alamat',
    'kota'
];



    public function employees()
    {
        return $this->hasMany(Employee::class, 'kode_cabang', 'kode_cabang');
    }
}
