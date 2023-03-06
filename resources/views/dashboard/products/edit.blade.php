@extends('layouts.dashboard')

@section('content-dashboard')
  <h1 class="mb-4">Edit Product</h1>
  <form action="{{ route("dashboard.products.update", $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required >
    </div>
    <div class="mb-3">
      <label for="spec" class="form-label">Specification</label>
      <textarea type="text" id="spec" name="spec" class="form-control" required>{{ old('name', $product->spec) }}
      </textarea>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
    </div>
    @if ($product->image)
      <img src="{{ asset("storage/" .$product->image) }}" alt="" class="mb-3 img-thumbnail" style="max-width: 18rem">
    @else
      <div class="border border-primary d-flex justify-content-center align-items-center shadow-sm mb-4" style="width: 18rem; height: 12rem">
        <p>You don't set the product image</p>
      </div>
    @endif
    <div class="mb-4">
        <label for="image" class="form-label">New Product Image</label>
        <input type="file" id="image" name="image" class="form-control" >
    </div>
    <div class="d-flex flex-row gap-2">
        <a href="{{ route('dashboard.products') }}" class="btn btn-secondary" >&laquo; Go Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
@endsection
