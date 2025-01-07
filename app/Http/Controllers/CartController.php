<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate(['option_id' => 'required|exists:product_options,id']);

        Cart::create(['product_option_id' => $request->option_id]);

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function remove(Request $request)
    {
        $request->validate(['option_id' => 'required|exists:carts,product_option_id']);

        Cart::where('product_option_id', $request->option_id)->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}
