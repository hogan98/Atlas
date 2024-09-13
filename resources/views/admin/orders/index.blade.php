@extends('layouts.app')

@section('title', 'Orders')

@section('content')

<div class="container">
    <h1 class="text-center">Orders</h1>
        
    <div class="mb-4">
        <a class="btn btn-primary text-white" href="{{ route('admin.orders.create') }}">Add a Order</a>
    </div>

    <div class="table-responsive">
        @if(count($orders))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Status
                        </th>
                        <th scope="col">
                            User Name 
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
                    @foreach ($orders as $order)
                    @php
                        $statusClass = match($order->status->colour) {
                            'Yellow' => 'status-yellow',
                            'Orange' => 'status-orange',
                            'Green' => 'status-green',
                            'Red' => 'status-red',
                            default => '',
                        };
                    @endphp

                        <tr>
                            <td class="{{ $statusClass }}">
                                {{ $order->status->name }}
                            </td>
                            <td>
                                {{ $order->user->name }}
                            </td>
                            <td>
                                {{ $order->created_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                {{ $order->updated_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                <form method="POST" action={{ route('admin.orders.destroy', $order) }}>
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        @else
            <p>
                There are no orders at the moment.
            </p>
        @endif
    </div>
</div>
@endsection
