<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    //nama tabel
    protected $table = 'tb_lelang';
    //primaryKey
    protected $primaryKey = 'id_lelang';
    //nama field
    protected $fillable = [
        'id_barang','tgl_lelang','harga_akhir','id_user','id_petugas','status'
    ];

    //relasi ke tabel/model barang
    public function barang() {
        //relasi one-to-one(1 field hanya bisa ada 1 field lagi)
    	return $this->hasOne('App\Barang','id_barang','id_barang');
    }

    //relasi ke tabel/model masyarakat
    public function masyarakat() {
        //relasi one-to-one(1 field hanya bisa ada 1 field lagi)
    	return $this->hasOne('App\Masyarakat','id_user','id_user');
    }

    //relasi ke tabel/model petugas
    public function petugas(){
        //relasi one-to-one(1 field hanya bisa ada 1 field lagi)
        return $this->hasOne('App\Petugas','id_petugas','id_petugas');
    }
}
