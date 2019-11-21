<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pengajuanHibah()
    {
        return $this->belongsTo(PengajuanHibah::class);
    }
}
