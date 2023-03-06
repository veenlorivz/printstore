@extends('layouts.dashboard')

@section('content-dashboard')
  <h1 class="mb-4">Add Product</h1>
  <form action="{{ route("dashboard.products.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="spec" class="form-label">Specification</label>
      <textarea type="text" id="spec" name="spec" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" id="price" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" id="stock" name="stock" class="form-control" required>
    </div>
    <div class="mb-4">
      <label for="image" class="form-label">Product Image</label>
      <input type="file" id="image" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
