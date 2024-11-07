<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        // Logique pour afficher les promotions en cours
        return view('promotions.index');
    }

    public function applyCoupon(Request $request)
    {
        // Logique pour appliquer un coupon de réduction
    }
}
