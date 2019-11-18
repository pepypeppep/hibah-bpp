<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaStaff extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
