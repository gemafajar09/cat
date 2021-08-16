<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingSoal extends Model
{
    protected $table = "tb_setting_soal";
    protected $primaryKey = 'setting_soal_id';
    protected $fillable = [
        'token_id',
        'kategori_id',
        'setting_soal_jumlah',
    ];
    public $timestamps = false;
}