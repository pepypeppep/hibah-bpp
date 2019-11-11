<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HibahKategori extends Model
{
    public function hibahs()
    {
        return $this->hasMany(Hibah::class);
    }
}
