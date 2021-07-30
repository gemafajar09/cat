<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMapel extends Model
{
    protected $table = "tb_submapel";
    protected $primaryKey = 'submapel_id';
    protected $fillable = [
        'submapel_mapel_id',
        'submapel_kategori'
    ];
    public $timestamps = false;
}
