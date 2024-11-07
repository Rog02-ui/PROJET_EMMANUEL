<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialCommerceController extends Controller
{
    public function index()
    {
        // Logique pour afficher la page de commerce social
        return view('socialCommerce.index');
    }
    
    public function community()
    {
        // Logique pour afficher la communauté d'achat
    }
}
