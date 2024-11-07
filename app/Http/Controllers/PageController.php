<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        return view('page'); // Affiche la vue 'page.blade.php'
    }
}
