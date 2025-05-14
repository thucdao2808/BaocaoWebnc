<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $banners = Banner::query()->get();
        $products_best = Product::where('quantity', '<', 10)->get();
        $product_sell = Product::latest()->take(5)->get();
        $customer = User::where('id', 2)->first();

        return view('project_1.customer.home', compact('banners', 'products_best', 'product_sell','customer'));
    }

    public function show(Product $product) {
    
        return view('project_1.customer.product.index', compact('product'));
    }
}
