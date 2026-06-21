<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $primaryKey = 'kode_barang';

public $incrementing = false;

protected $keyType = 'string';

protected $fillable = [
'kode_barang',
'kode_kategori',
'nama_barang',
'harga',
'stok'
];




    public function category()
    {
        return $this->belongsTo(Category::class, 'kode_kategori', 'kode_kategori');
    }
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'kode_barang', 'kode_barang');
    }

}
