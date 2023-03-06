@extends('layouts.app')

@section('content')
  <div class="ps-5 pe-5">
    <h1 class="display-6">Cart</h1>
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ Session::get('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @forelse ($carts as $cart)
      <div class="card flex-row flex-start py-4 px-5 my-4 gap-4">
        <img class="card-img-start" src="{{ $cart->product->image ? asset('storage/' . $cart->product->image) : asset('storage/product_pic/printer.png') }}" style="width: 15rem; object-fit: cover">
        <div class="card-body">
          <div class="mb-3 row align-items-center">
            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <div>{{ $cart->product->name }}</div>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control-plaintext" name="price" id="price" value={{ $cart->product->price }} readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label ">Quantity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control-plaintext" name="name" id="name" value={{ $cart->quantity }} readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="number" class="form-control-plaintext" name="name" id="name" value={{ $cart->quantity * $cart->product->price }} readonly>
            </div>
          </div>
          <div class="d-flex gap-2">
              <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="number" name="user_id" value={{ Auth::user()->id }} class="d-none">
                <input type="number" name="cart_id" value={{ $cart->id }} class="d-none">
                <input type="number" name="product_id" value={{ $cart->product->id }} class="d-none">
                <input type="number" name="quantity" value={{ $cart->quantity }} class="d-none">
                <button class="btn btn-primary" type="submit">Buy Now</button>
              </form>
              <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove</button>
              </form>
          </div>
        </div>
      </div>
    @empty
    <div class="position-absolute top-50 start-50 translate-middle">
      <div class="">
          <div class="d-flex align-items-center justify-content-center">
              <h5 class="mb-2">Your cart is&nbsp;</h5>
              <h5 class="text-danger">Empty!</h5>
          </div>
            <p class="fw-lighter mb-1 text-muted text-center">Add any product to cart <a href="{{ route('home') }}">here</a></p>
      </div>
    @endforelse
  </div>
@endsection
