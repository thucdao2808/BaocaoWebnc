<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    //
    public function index (){
        // echo"<pre>";
        // print_r( session()->get('cart'));
        session()->get('cart');
        return view('project_1.customer.product.cartProduct');
    }
    public function updateCart(Request $request){
        // dd($request->all());
        $id = $request->id;
        $quantity = $request->quantity;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);

    }
    public function deleteCart(Request $request){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts = session()->get('cart');
            return response()->json(['success' => true]);

    }
    
}
