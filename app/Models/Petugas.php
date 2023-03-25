<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    //nama tabel
    protected $table = 'tb_petugas';
    //primaryKey
    protected $primaryKey = 'id_petugas';
    //nama field
    protected $fillable = [
        'nama_petugas','username','password','id_level'
    ];

    //relasi ke tabel/model level
    public function level(){
        //relasi one-to-one(1 field hanya bisa ada 1 field lagi)
        return $this->hasOne('App\Level','id_level','id_level');
    }

    //untuk relasi ke table/model lelang
    public function lelang() {
        //relasi one-to-many (1 field bisa banyak data) dan many-to-many (banyak field bisa banyak data)
        return $this->hasMany('App\Lelang','id_user','id_user');
    }
}
