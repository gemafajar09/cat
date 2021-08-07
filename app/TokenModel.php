<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    protected $table = "tb_token";
    protected $primaryKey = 'token_id';
    protected $fillable = [
        'token_tanggal',
        'token_jam_mulai',
        'token_jam_selesai',
        'token_key',
    ];
    public $timestamps = false;
}