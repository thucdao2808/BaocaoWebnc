<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;


class OrderController extends Controller
{
    //
    

    public function index() {
        $orders = Auth::user()->orders;

        return view('project_1.customer.order.index', compact('orders'));
    }
}
