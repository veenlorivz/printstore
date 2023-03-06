@extends('layouts.dashboard')

@section('content-dashboard')
    <h1 class="mb-3">Products</h1>
    <a href="{{ route("dashboard.products.create") }}" class="btn btn-primary mb-4">Add Product</a>
    <div class="card p-3 shadow">

        <table class="table">
            <thead class=table-secondary>
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
                    <td>
                        @php
                        $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                        echo $fmt->formatCurrency($product->price, "IDR")
                        @endphp
                    </td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div>
                            <a href=" {{ route('dashboard.products.show', $product->id) }} " class="btn btn-sm btn-info text-white">Detail</a>
                            <a href=" {{ route('dashboard.products.edit', $product->id) }} " class="btn btn-sm btn-warning text-white">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
