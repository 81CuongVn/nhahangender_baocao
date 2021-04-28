<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class NhanVien extends Authenticatable
{
    use Notifiable;

    protected $table = 'nhanvien';
    protected $guard = 'nhanvien';

    protected $primaryKey = 'IdNV';

    protected $fillable = [
        // 'nv_id',
        'IdCV',
        'IdNhaHang',
        'TenNV',
        'GioiTinhNV',
        'SdtNV',
        'DiaChiNV',
        'username',
        'password',
    ];

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];
}
