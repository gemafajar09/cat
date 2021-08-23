<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_nik',
        'user_nama',
        'user_no_hp',
        'user_email',
        'user_password',
        'user_password1',
    ];
    public $timestamps = false;
}