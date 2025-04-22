<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


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
}
