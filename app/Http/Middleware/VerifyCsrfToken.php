<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui devraient être exclues de la vérification CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'cart/add/*', // Désactive la vérification CSRF pour les URLs de type 'cart/add/*'
    ];
}
