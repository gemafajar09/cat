<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = "tb_mapel";
    protected $primaryKey = 'mapel_id';
    protected $fillable = [
        'mapel_kategori'
    ];
    public $timestamps = false;
}
