<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalSkor extends Model
{
    protected $table = "tb_skorsoal";
    protected $primaryKey = 'skorsoal_id';
    protected $fillable = [
        'skorsoal_soal_id',
        'skorsoal_a',
        'skorsoal_b',
        'skorsoal_c',
        'skorsoal_d',
        'skorsoal_e',
    ];
    public $timestamps = false;
}
