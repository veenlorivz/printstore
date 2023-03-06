@extends('layouts.dashboard')

@section('content-dashboard')

    @php
        function sum($carry, $item){
            $carry += $item;
            return $carry;
        }
    @endphp

    <h1 class="mb-4">Customers</h1>
    <div class="card p-3 shadow">
        <table class="table">
            <thead class=table-secondary>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Orders</th>
                <th scope="col">Product Ordered</th>
                <th scope="col">Total Spent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $index=>$customer)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ count($customer->order) }}</td>
                        <td >{{  count($customer->order) ?  implode("", array_map(function($order) {
                            return $order['product']['name'] . ' (' .  $order['quantity']. ' pcs) '. ', ';
                        }, $customer->order->toArray()))  : 'None'}}</td>
                        <td>
                            @php
                            $fmt = new NumberFormatter( 'id_id', NumberFormatter::CURRENCY );
                            echo $fmt->formatCurrency(array_sum(array_map(function ($order) {
                            for ($i=0; $i < count($order); $i++) {
                                return $order['total'];
                            }
                            }, $customer->order->toArray())), "IDR");
                            @endphp
                    </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection


