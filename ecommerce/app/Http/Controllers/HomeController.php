<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $featuredProducts = Product::active()->featured()->take(4)->get();
        $latestProducts = Product::active()->latest()->take(4)->get();
    
        return view('home', compact('featuredProducts', 'latestProducts')); 
    }
}

