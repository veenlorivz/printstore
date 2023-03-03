@extends('layouts.dashboard')

@section('content-dashboard')
<h1 class="mb-5">Orders</h1>
<h3 class="mb-2">Waited Orders</h3>
<hr>
<table class="table table-success">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($waited_orders as $order)
            <tr class="">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->product->price }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->quantity * $order->product->price }}</td>
                <td>
                    <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success btn-sm" type="submit">Approve</button>
                    </form>
                </td>
            </tr>
        @empty
            <td colspan="7 d-flex align-items-center">
                <h5 class="text-center text-bold">There's no waited order to approve!</h5>
            </td>
        @endforelse

    </tbody>
</table>
<h3 class="mt-5 mb-2">Approved Orders</h3>
<hr>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($approved_orders as $order)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->product->price }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->quantity * $order->product->price }}</td>
                <td>
                    <form action="{{ route('orders.delete', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
