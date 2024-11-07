<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// use laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
   use HasFactory, HasApiTokens, Notifiable;

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    /**
     * Les attributs à masquer dans les tableaux.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être mutés en types natifs.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
