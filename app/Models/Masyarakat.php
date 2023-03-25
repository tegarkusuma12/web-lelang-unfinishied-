<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    //nama table
    protected $table = 'tb_masyarakat';
    //primary key
    protected $primaryKey = 'id_user';
    //nama field
    protected $fillable = [
        'nama_lengkap','username','pass','telp'
    ];

    //untuk relasi ke table/model lelang
    //relasi one-to-many (1 field bisa banyak data) dan many-to-many (banyak field bisa banyak data)
    public function lelang() {
        return $this->hasMany('App\Lelang','id_user','id_user');
    }
}
