<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::get();
        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if ($product) {
                $cartItems[] = (object)[
                    'product' => $product,
                    'quantity' => $qty,
                ];
                $subtotal += $product->price * $qty;
            }
        }

        $gst = round($subtotal * 0.18);
        $total = $subtotal + $gst;

        return view('cart', compact('cartItems', 'subtotal', 'gst', 'total'));
    }

    public function add(Request $request, $id)
    {
        Cart::add($id, 1);
        return back()->with('success', 'Added to cart!');
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, $request->quantity);
        return back();
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back();
    }
}