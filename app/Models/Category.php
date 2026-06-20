<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $primaryKey = 'kode_kategori';

public $incrementing = false;

protected $keyType = 'string';

protected $fillable = [
'kode_kategori',
'nama_kategori'
];




    public function products()
    {
        return $this->hasMany(Product::class, 'kode_kategori', 'kode_kategori');
    }
}
