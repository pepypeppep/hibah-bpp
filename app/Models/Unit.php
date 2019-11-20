<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function hibahs()
    {
        return $this->hasMany(Hibah::class);
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
