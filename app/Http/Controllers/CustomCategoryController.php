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
        $products = Product::latest()->paginate(4);
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
    public function editInformation(){
        return(view('project_1.customer.information.edit'));
    }
    public function updateInformation(Request $request){
        // Lấy thông tin từ form
        $address = $request->address;
        $email = $request->email;
        $username = $request->username;
        $user = Auth::user();
    
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để cập nhật thông tin.');
        }
        // dd($request->all());
        // Kiểm tra và xử lý avatar
        $avatarPath = $user->avatar;
         // Giữ nguyên ảnh cũ nếu không có ảnh mới
        if ($request->file('avatar')) {
            // Xóa ảnh cũ nếu có
            
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
    
            // Lưu ảnh mới vào thư mục 'public/customer'
            $avatarPath = $request->file('avatar')->store('customer', 'public');
        }
    
        // Cập nhật thông tin người dùng
        $user->update([
            'address' => $address,
            'email' => $email,
            'username' => $username,
            'avatar' => $avatarPath, // Lưu đường dẫn avatar mới
        ]);
    
        return redirect()->route('home')->with('success', 'Cập nhật thành công!');
    }
    public function editPassword(){
        return(view('project_1.customer.information.changePassword'));
    }
    public function updatePassword(Request $request){
  
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:4', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
    }
        
    
    
}
