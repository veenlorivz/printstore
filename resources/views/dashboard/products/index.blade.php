@extends('layouts.dashboard')

@section('content-dashboard')
    <h1 class="mb-5">Products</h1>
    <table class="table table-light">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <div>
                        <a href="" class="btn btn-warning text-white">Edit</a>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
