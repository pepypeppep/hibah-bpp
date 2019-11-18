<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanHibah extends Model
{
    public function hibah()
    {
        return $this->belongsTo(Hibah::class);
    }

    public function berkas()
    {
        return $this->hasMany(HibahBerkas::class);
    }
}
