<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'kode_barang',
        'qty',
        'harga',
        'subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'kode_barang','kode_barang');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

}
