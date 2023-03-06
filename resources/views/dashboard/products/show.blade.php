@extends('layouts.dashboard')

@section('content-dashboard')
  <h1 class="mb-4">Detail Product</h1>
  <form action="{{ route("dashboard.products.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" id="name" name="name" class="form-control" value={{ $product->name }}>
    </div>
    <div class="mb-3">
      <label for="spec" class="form-label">Specification</label>
      <textarea type="text" id="spec" name="spec" class="form-control" readonly>{{ $product->spec }}</textarea>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" id="price" name="price" class="form-control" value={{ $product->price }} readonly>
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" id="stock" name="stock" class="form-control" value={{ $product->stock }} readonly>
    </div>
    <div class="mb-2">
      <label for="image" class="form-label">Product Image</label>
    </div>
    @if ($product->image)
      <img src="{{ asset("storage/" .$product->image) }}" alt="" class="mb-3 img-thumbnail" style="max-width: 18rem">
    @else
      <div class="border border-primary d-flex justify-content-center align-items-center shadow-sm mb-4" style="width: 18rem; height: 12rem">
        <p>You don't set the product image</p>
      </div>
    @endif
    <div>
        <a href="{{ route('dashboard.products') }}" class="btn btn-success" >&laquo; Go Back</a>
    </div>
  </form>
@endsection
