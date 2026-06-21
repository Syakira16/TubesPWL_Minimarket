<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $fillable = [
      'kode_barang',
      'jumlah',
      'tanggal'
    ];

  public function product()
{
  return $this->belongsTo(Product::class,'kode_barang','kode_barang');
}

}
