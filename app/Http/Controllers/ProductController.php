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
    public function show($id){
        $product = Product::findorFail($id);
        return view('product_detail',compact('product'));
    }

  

  
}
