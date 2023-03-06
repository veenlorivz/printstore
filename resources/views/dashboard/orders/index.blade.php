@extends('layouts.dashboard')

@section('content-dashboard')
    <h1 class="mb-4">Orders</h1>
    <div class="card p-3 shadow">
        <h3>Waited Orders</h3>
        <hr class="w-25">
        <table class="table">
            <thead class="table-secondary" >
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Approved ?</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($waited_orders as $order)
                    <tr class="">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->created_at->format('d-m-y, g:i') }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency($order->product->price, "IDR")
                            @endphp
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency($order->quantity * $order->product->price, "IDR");
                            @endphp
                        </td>
                        <td class="d-flex gap-1">
                            <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm" type="submit">Approve</button>
                            </form>
                            <form action="{{ route('orders.reject', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm" type="submit">Reject</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="8">
                        <h5 class="text-center text-bold">There's no waited order to approve!</h5>
                    </td>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="card p-3 shadow mt-4">
        <h3>Approved Orders</h3>
        <hr class="w-25">
        <table class="table">
            <thead class=table-secondary>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($approved_orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->created_at->format('d-m-y, g:i') }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency($order->product->price, "IDR")
                            @endphp
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency($order->quantity * $order->product->price, "IDR");
                            @endphp
                        </td>
                        <td>
                            <form action="{{ route('orders.reject', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm" type="submit">Reject</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <td colspan="8">
                    <h5 class="text-center text-bold">There's no approved order</h5>
                </td>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card p-3 shadow mt-4">

        <h3>Rejected Orders</h3>
        <hr class="w-25">
        <table class="table">
            <thead class=table-secondary>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rejected_orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->created_at->format('d-m-y, g:i') }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency($order->product->price, "IDR");
                            @endphp
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency($order->quantity * $order->product->price, "IDR");
                            @endphp
                        </td>
                        <td>
                            <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm" type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <td colspan="8">
                    <h5 class="text-center text-bold">There's no rejected order</h5>
                </td>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
