<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash; 


class CustomCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(8);
        return view('project_1.customer.category', compact('categories', 'products'));
    }

    public function listproduct($id){
            $categories= Category::all();

            $products = Product::where('category_id',$id)->paginate(6);
            return view('project_1.customer.category',compact('categories','products'));
    }
    public function addToCart($id){
        // session()->forget('cart');
        // dd('end');

        $product =Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
                $cart[$id]['quantity']= $cart[$id]['quantity']+1;
        }
        else{
                $cart[$id] =[
                    
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'id'=>$id,
                    'quantity'=>1,
                    'image_path'=>$product->image_path,
                    'description'=>$product->description,
                ];
        }

        session()->put('cart',$cart);
        if (auth()->check()) {
            $userId = auth()->id();
    
            $cartItem = Cartitem::where('user_id', $userId)
                            ->where('product_id', $id)
                            ->first();
    
            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                    Cartitem::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                    'quantity' => 1,
                ]);
            }
        }
        return response()->json([
                'code'=>200,
                'message'=>'success'

        ],200);
    }
    
    
    
}
