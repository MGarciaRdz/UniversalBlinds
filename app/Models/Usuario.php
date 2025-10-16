<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name', // o 'name', según tu tabla
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
