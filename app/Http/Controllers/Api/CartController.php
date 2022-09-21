<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(CartRequest $request)
    {
        try {
            $request->validated();
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->has('quantity') && $request->quantity > 0?$request->quantity:1,
                'specifications' => json_encode($request->specifications)
            ]);  
            $cart = Cart::where('user_id', auth()->user()->id)->get();
            return ['cart' => $cart];
        } catch (Exception $e) {
            return ['exception' => $e->getMessage()];
        }
    }
    public function getCart()
    {
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        return ['cart' => $cart];
    }
    public function removeCart($id)
    {
        $cart = Cart::where('id', $id)->delete();
        return ['status' => $cart];
    }
    public function removeAllCart()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->delete();
        return ['status' => $cart];
    }
}
