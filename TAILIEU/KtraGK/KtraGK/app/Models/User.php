<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'email', 
        'password', 
        'user_role', 
        'login_status', 
        'login_time'
    ];
    
}