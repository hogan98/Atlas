@extends('layouts.app')

@section('title', 'Orders')

@section('content')
   <div class="container">
        <h2 class="text-center">Order Details</h2>

    <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Guest Name
                        </th>
                        <th scope="col">
                            Guest Email
                        </th>
                        <th scope="col">
                            Guest Phone Number
                        </th>
                        <th scope="col">
                            Guest Address
                        </th>
                        <th scope="col">
                            Status
                        </th>
                        <th scope="col">
                            Created At
                        </th>
                        <th scope="col">
                            Updated At
                        </th>
                        <th scope="col">
                            Options
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $statusClass = match($order->status->colour) {
                            'Yellow' => 'status-yellow',
                            'Blue' => 'status-blue',
                            'Green' => 'status-green',
                            'Red' => 'status-red',
                            default => '',
                        };
                    @endphp

                    <tr>
                        <td>
                            {{ $order->name }}
                        </td>
                        <td>
                            {{ $order->email }}
                        </td>
                        <td>
                            {{ $order->phone }}
                        </td>
                        <td>
                            {{ $order->address }}
                        </td>
                        
                        <td class="{{ $statusClass }}">
                            {{ $order->status->name }}
                        </td>
                        <td>
                            {{ $order->created_at?->format('d/m/Y H:i')}}
                        </td>
                        <td>
                            {{ $order->updated_at?->format('d/m/Y H:i')}}
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-success">Edit Order</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
    <h2 class="text-center">Purchase Details</h2>
        <div class="table-responsive">
            @if($order->purchases->count())
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->product->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $purchase->product->image) }}" 
                                        alt="{{ $purchase->product->name }}" 
                                        style="width: 50px; height: 50px;">
                                </td>
                                <td>€{{ $purchase->price }}</td>
                                <td>{{ $purchase->qty }}</td>
                                <td>€{{ $purchase->total }}</td>
                                <td>{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $purchase->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>There are no purchases for this order at the moment.</p>
            @endif
            <a class="btn btn-primary" href="{{ route('admin.orders.index') }}">Back to Orders</a>
        </div>
@endsection
