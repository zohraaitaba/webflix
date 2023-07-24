<?php

namespace App;

use App\Models\Movie;

class Cart
{
    public static function count()
    {
        return collect(session('cart', []))->sum('quantity');
    }

    public static function items()
    {
        $cart = session('cart', []);

        $movies = Movie::findMany(array_column($cart, 'id'));
        foreach ($cart as $index => $item) {
            $movie = $movies[$index];
            $cart[$index]['movie'] = $movie;
            $cart[$index]['price'] = $movie->price * $item['quantity'];
        }

        return $cart;
    }

    public static function total()
    {
        $items = self::items();
        $total = 0;

        foreach ($items as $item) {
            $total += $item['price'];
        }

        return $total;
    }
}