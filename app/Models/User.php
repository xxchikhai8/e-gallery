<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = "userID";
    protected $fillable = [
        'username',
        'password',
        'avatar',
        'remember_token'
    ];
    public $timestamps = true;
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
