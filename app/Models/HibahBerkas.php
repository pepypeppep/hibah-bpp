<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HibahBerkas extends Model
{
    public function pengajuanHibah()
    {
        return $this->belongsTo(PengajuanHibah::class);
    }
}
