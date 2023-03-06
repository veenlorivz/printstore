@extends('layouts.app')

@section('content')
  <style>
    .input-cart {
      width: 52%;
      outline: 0;
      border-width: 0 0 2px;
      border-color: black;
    }
  </style>


<div class="row ps-5 pe-5">
    <h1 class="display-6 mb-4 fw-light">Our Products</h1>
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ Session::get('success') }}, check in <a href="{{ route('cart') }}">this page</a>
        <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
      @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-xl-3 mt-2">
            <div class="card shadow" >
                <img src="{{ $product->image ? asset("storage/". $product->image) : asset("storage/product_pic/printer.png") }}  " class="card-img-top" alt="Product Image" style="height: 12rem; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text fw-bold">{{"Rp. ". $product->price}}</p>
                  <p class="card-text">{{$product->spec}}</p>
                  <form class="d-flex flex-row align-items-center mb-2" action={{route( 'cart.store' )}} method="POST">
                      @csrf
                      @method('POST')
                      <input type="number" value="{{ $product->id }}" name="product_id" class="d-none">
                      <input type="number" value="{{ Auth::user()->id }}" name="user_id" class="d-none">
                      <input type="number" class="input-cart" value="1" name="quantity">
                      <div class="ms-auto cart-button" >
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                      </div>
                  </form>
                </div>
              </div>
        </div>
      @endforeach
  </div>
@endsection
