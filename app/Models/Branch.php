<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function employees()
    {
        return $this->hasMany(Employee::class, 'kode_cabang', 'kode_cabang');
    }
}
