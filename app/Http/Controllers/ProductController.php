<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = array_filter(explode(',', $product->image));
        return view('product-detail', compact('product', 'images'));
    }
}
