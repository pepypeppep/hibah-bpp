<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanHibah extends Model
{
    public function hibah()
    {
        return $this->belongsTo(Hibah::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function proposal()
    {
        return $this->hasMany(HibahBerkas::class)->where('jenis_dokumen_id', 1);
    }

    public function berkas()
    {
        return $this->hasMany(HibahBerkas::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviewer::class);
    }

    public function luarans()
    {
        return $this->hasMany(Luaran::class);
    }
}
