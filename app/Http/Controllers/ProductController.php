<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            "name" => "required|string|max:255",
            "spec" => "required|string",
            "spec" => "required|string",
            "price" => "required|integer",
            "stock" => "required|integer",
            "image" => "image|nullable",
        ]);

        if($request->file("image")){
            $product['image'] = $request->file('image')->store("product_pic", 'public');
        }

        Product::create($product);

        return redirect("/dashboard/products");
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view("dashboard.products.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("dashboard.products.edit", [
            "product" => Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $new_product = $request->validate([
            "name" => "required|string|max:255",
            "spec" => "required|string",
            "spec" => "required|string",
            "price" => "required|integer",
            "stock" => "required|integer",
            "image" => "image|nullable",
        ]);

        if($request->file('image')){
            if($product->image){
                Storage::disk("public")->delete($product->image);
            }
            $new_product['image'] = $request->file('image')->store("product_pic", 'public');
        }

        $product->update($new_product);

        return redirect()->route("dashboard.products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
