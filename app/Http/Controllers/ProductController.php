<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome',compact('products'));
    }

  

    public function index2()
    {
        $products = Product::all(); // Fetch all products
        return view('dashboard', compact('products'));
    }
}
