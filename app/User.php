<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function anggotaStaffs()
    {
        return $this->hasMany('App\Models\AnggotaStaff', 'anggota_staff_id', 'id');
    }

    public function anggotaMahasiswas()
    {
        return $this->hasMany('App\Models\AnggotaMahasiswa');
    }

    public function pengajuanHibah()
    {
        return $this->hasMany('App\Models\PengajuanHibah');
    }

    public function reviewers()
    {
        return $this->hasMany('App\Models\PengajuanHibah');
    }
}
