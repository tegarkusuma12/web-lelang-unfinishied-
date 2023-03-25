<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    //nama tabel
    protected $table = 'history_lelang';
    //primaryKey
    protected $primaryKey = 'id_history';
    //nama field
    protected $fillable = [
    	'id_lelang','id_barang','id_user','penawaran_harga'
    ];

    //relasi ke tabel/model lelang
    public function lelang() {
        //relasi one-to-one(1 field hanya bisa ada 1 field lagi)
    	return $this->hasOne('App\Lelang','id_barang','id_barang');
    }

    //relasi ke tabel/model masyarakat
    public function masyarakat() {
        //relasi many-to-many(banyak data bisa dimasukkan ke banyak field)
    	return $this->hasMany('App\Masyarakat','id_user','id_user');
    }
}
