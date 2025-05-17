<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use App\Models\Product;


class ProductCartController extends Controller
{
    //
    public function index (){
        // echo"<pre>";
        // print_r( session()->get('cart'));
        if (auth()->check()) {
            $cartItems = [];
            $userId = auth()->id();
    
            // Lấy giỏ hàng từ bảng cartitems
            $cartDb = Cartitem::where('user_id', $userId)->get();
    
            foreach ($cartDb as $item) {
                // Truy vấn sản phẩm thủ công
                $product = Product::find($item->product_id);
                if ($product) {
                    $cartItems[$item->product_id] = [
                        'id'=>$item->product_id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'image_path' => $product->image_path,
                        'quantity' => $item->quantity,
                        'description'=>$product->description,
                    ];
                }
            }
    
            // Cập nhật vào session nếu cần đồng bộ
            session()->put('cart', $cartItems);
            session()->get('cart');
        return view('project_1.customer.product.cartProduct', compact('cartDb'));
        }
        
    }
    public function updateCart(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
    
        // Cập nhật session
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }
    
        // Cập nhật DB nếu đã đăng nhập
        if (auth()->check()) {
            $userId = auth()->id();
    
            $cartItem = Cartitem::where('user_id', $userId)
                        ->where('product_id', $id)
                        ->first();
    
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }
    
        return response()->json(['success' => true]);
    }
    
    public function deleteCart(Request $request){
        
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts = session()->get('cart');
            if (auth()->check()) {
                $userId = auth()->id();
                
                // Tìm và xóa Cartitem trong cơ sở dữ liệu dựa trên product_id và user_id
                $cartItem = Cartitem::where('user_id', $userId)
                                    ->where('product_id', $request->id)
                                    ->first();
        
                if ($cartItem) {
                    $cartItem->delete();  // Xóa sản phẩm khỏi cơ sở dữ liệu
                }
            }
            return response()->json(['success' => true]);

    }
    
}
