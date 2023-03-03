<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function products(){
        $products = Product::all();
        return view("dashboard.products.index", compact('products'));
    }

    public function orders(){
        $approved_orders = Order::with('user')->where('is_approved', true)->get();
        $waited_orders = Order::with('user')->where('is_approved', false)->get();
        return view("dashboard.orders.index", compact(['approved_orders', 'waited_orders']));
    }

    public function customers(){
        $orders = Order::with(['product', 'user'])->get();
        return view("dashboard.customers.index", compact('orders'));
    }
}
