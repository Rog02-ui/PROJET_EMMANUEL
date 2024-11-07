<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Logique pour récupérer les catégories et sous-catégories
        return view('menu');
    }
}
