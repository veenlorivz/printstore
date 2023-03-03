@extends('layouts.dashboard')

@section('content-dashboard')
    <h1 class="mb-4">Customers</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Buy Date</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Is Approved ?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->quantity * $order->product->price }}</td>
                    <td>{{ $order->is_approved ? "Yes" : "No" }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection


