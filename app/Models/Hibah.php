<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hibah extends Model
{
    public function category()
    {
        return $this->belongsTo(HibahKategori::class,'hibah_kategori_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function pengajuanHibah()
    {
        return $this->hasMany(PengajuanHibah::class);
    }
}
