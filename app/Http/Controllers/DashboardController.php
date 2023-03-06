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
        $approved_orders = Order::with('user')->where('status', "approved")->latest()->get();
        $waited_orders = Order::with('user')->where('status', 'waited')->latest()->get();
        $rejected_orders = Order::with('user')->where('status', 'rejected')->latest()->get();
        return view("dashboard.orders.index", compact(['approved_orders', 'waited_orders', 'rejected_orders']));
    }

    public function customers(){
        $customers = User::with(['order', 'order.product'])->where("role", "!=", "admin")->get();
        return view("dashboard.customers.index", compact(['customers']));
    }
}
