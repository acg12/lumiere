<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $user_id = auth()->id();
        $data = Cart::query()
            ->where('user_id', '=', $user_id)
            ->get();
        $edit = 0;
        return view('/cart', compact('data', 'edit'));
    }

    public function addToCart(Request $request, $id) {
        $qty = (int) $request->quantity;
        $user_id = auth()->id();
        $id = (int) $id;

        $cart = Cart::query()
            ->where([
                ['user_id', '=', "$user_id"],
                ['product_id', '=', "$id"],
            ])
            ->get()->first();

        if($cart != null) {
            $qty = $qty + $cart->quantity;
            Cart::query()
                ->where([
                    ['user_id', '=', "$user_id"],
                    ['product_id', '=', "$id"],
                ])
                ->update(['quantity' => "$qty"]);
        } else {
            Cart::create(['user_id' => $user_id, 'product_id' => $id, 'quantity' => $qty]);
        }

//        $product = Product::query()
//            ->where('id', '=', "$id")
//            ->get()->first();
//        $curr_stock = $product->product_stock;
//        $product->product_stock = $curr_stock - $qty;
//        $product->save();

        return redirect('/cart');
    }

    public function save($id, Request $request) {
        $user_id = auth()->id();
        Cart::query()
            ->where([
                ['user_id', '=', "$user_id"],
                ['product_id', '=', "$id"]
            ])
            ->update(['quantity' => "$request->quantity"]);

        return redirect('/cart');
    }

    public function edit($id) {
        $user_id = auth()->id();
        $data = Cart::query()
            ->where('user_id', '=', $user_id)
            ->get();
        $edit = $id;
        return view('cart', compact('data', 'edit'));
    }

    public function remove($id) {
        $user_id = auth()->id();
        Cart::query()
            ->where('user_id', '=', "$user_id")
            ->where('product_id', '=', "$id")
            ->delete();
        return redirect('/cart');
    }

    public function checkout() {
        $user_id = auth()->id();
        Cart::query()
            ->where('user_id', '=', "$user_id")
            ->delete();
        return redirect('/cart');
    }
}
