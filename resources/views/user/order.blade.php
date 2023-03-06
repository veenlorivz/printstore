@extends('layouts.app')

@section('content')
  <div class="ps-5 pe-5">
    <h1 class="display-6">Order</h1>
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ Session::get('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @forelse ($orders as $order)
      <div class="card flex-row flex-start py-4 px-5 my-4 gap-4">
        <img class="card-img-start" src="{{ $order->product->image ? asset('storage/' . $order->product->image) : asset('storage/product_pic/printer.png') }}" style="width: 15rem; object-fit: cover">
        <div class="card-body">
          <div class="mb-3 row align-items-center">
            <label class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
              <div>{{ $order->product->name }}</div>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control-plaintext" name="price" id="price" value={{ $order->product->price }} readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label ">Quantity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control-plaintext" value={{ $order->quantity }} readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="number" class="form-control-plaintext" value={{ $order->quantity * $order->product->price }} readonly>
            </div>
          </div>
          <div class="mb-3 row align-items-center">
            <label class="col-sm-2 col-form-label">Approved</label>
            <div class="col-sm-10">
                <h2 class="badge
                @if ($order->status == 'waited')
                    {{'bg-primary'}}
                @elseif ($order->status == 'approved')
                    {{'bg-success'}}
                @elseif ($order->status == 'rejected')
                    {{'bg-danger'}}
                @endif
                text-center rounded-pill px-2 py-1">
                  {{ $order->status  }}
                </h2>
            </div>
          </div>
        </div>
      </div>
    @empty
    <div class="position-absolute top-50 start-50 translate-middle">
      <div class="">
          <div class="d-flex align-items-center justify-content-center">
              <h5 class="mb-2">You're not ordering any product&nbsp;</h5>
          </div>
            <p class="fw-lighter mb-1 text-muted text-center">Order a product <a href="{{ route('home') }}">here</a></p>
      </div>
    @endforelse
  </div>
@endsection
