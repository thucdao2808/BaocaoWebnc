<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $banners = Banner::query()->get();
        $products_best = Product::where('quantity', '<', 10)->get();
        return view('project_1.customer.home', compact('banners', 'products_best'));
    }

    public function show(Product $product) {
        return view('project_1.customer.product.index', compact('product'));
    }
}
