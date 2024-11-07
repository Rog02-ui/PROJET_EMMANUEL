<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        // Logique pour afficher la page de support
        return view('support.index');
    }
    
    public function contact(Request $request)
    {
        // Logique pour traiter un message de contact
    }
}
