<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "tb_admin";
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_nama', 
        'admin_username', 
        'admin_password', 
        'admin_notelp', 
        'admin_alamat', 
        'admin_level', 
    ];
}
