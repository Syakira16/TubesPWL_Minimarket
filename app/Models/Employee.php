<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'kode_cabang', 'kode_cabang');
    }
}
