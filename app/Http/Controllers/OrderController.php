<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['product'])->where('user_id', Auth::user()->id)->latest()->get();
        return view('user.order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $order = $request->validate([
            "user_id" => "required|integer",
            "product_id" => "required|integer",
            "quantity" => "required|integer",
        ]);

        $order['total'] = $request->quantity * $product->price;

        Order::create($order);
        Cart::destroy($request->cart_id);

        return redirect()->route('orders.index')->with('success', "Product has been successfully ordered");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect('/dashboard/orders');
    }

    /**
     * Approve the order.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve($id){
        $order = Order::find($id);
        $order->status = 'approved';
        $order->save();

        return redirect('/dashboard/orders');
    }

    /**
     * Reject the order.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject($id){
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->save();

        return redirect('/dashboard/orders');
    }
}
