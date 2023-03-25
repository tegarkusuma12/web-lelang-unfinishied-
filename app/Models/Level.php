<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    //nama table
    protected $table = 'tb_level';
    //primaryKey
    protected $primaryKey = 'id_level';
    //nama field
    protected $fillable = [
        'level'
    ];
}
