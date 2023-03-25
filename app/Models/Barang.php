<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    //nama tabel
    protected $table = 'tb_barang';
    //primaryKey
    protected $primaryKey = 'id_barang';
    //nama field 
    protected $fillable = [
    	'nama_barang','tgl','harga_awal','deskripsi_barang'
    ];

    //relasi ke tabel/model lelang
    public function lelang() {
        //relasi one-to-one(1 field hanya bisa ada 1 field lagi)
    	return $this->hasOne('App\Lelang','id_barang','id_barang');
    }
}
