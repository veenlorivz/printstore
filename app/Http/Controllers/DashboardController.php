<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function products(){
        return view("dashboard.products");
    }

    public function orders(){
        return view("dashboard.orders");
    }

    public function customers(){
        return view("dashboard.customers");
    }
}
