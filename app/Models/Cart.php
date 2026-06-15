<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class Cart
{
    public static function add($productId, $qty = 1)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId] += $qty;
        } else {
            $cart[$productId] = $qty;
        }

        Session::put('cart', $cart);
    }

    public static function remove($productId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$productId]);
        Session::put('cart', $cart);
    }

    public static function update($productId, $qty)
    {
        $cart = Session::get('cart', []);
        if ($qty <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $qty;
        }
        Session::put('cart', $cart);
    }

    public static function get()
    {
        return Session::get('cart', []);
    }

    public static function count()
    {
        return array_sum(self::get());
    }
}