<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    protected $table = "tb_token";
    protected $primaryKey = 'token_id';
    protected $fillable = [
        'token_tanggal',
        'token_jam',
        'token_key',
    ];
    public $timestamps = false;
}