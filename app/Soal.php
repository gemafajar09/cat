<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = "tb_master_soal";
    protected $primaryKey = 'soal_id';
    protected $fillable = [
        'soal_kategori_id',
        'soal_mapel_id',
        'soal_submapel_id',
        'soal_ujian_tipe',
        'soal_ujian',
        'soal_pilihan_tipe',
        'soal_a',
        'soal_b',
        'soal_c',
        'soal_d',
        'soal_e',
    ];
    public $timestamps = false;
}
