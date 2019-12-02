<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Luaran extends Model
{
    public function pengajuanHibah()
    {
        return $this->belongsTo(PengajuanHibah::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
