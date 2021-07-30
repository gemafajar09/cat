<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSoal extends Model
{
    protected $table = "tb_kategori_soal";
    protected $primaryKey = 'kategori_id';
    protected $fillable = [
        'kategori_soal'
    ];
    public $timestamps = false;
}
