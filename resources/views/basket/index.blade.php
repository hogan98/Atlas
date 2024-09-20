@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center">Your Basket</h1>
        <div class="row">
            @if(count($basket) > 0)
                <div class="items-container mt-3">
                    @foreach($basket as $id => $details)
                    <div class="row">
                        <div class="col">
                             <img src="{{ asset('storage/' . $details['image']) }}" width="100px" height="100px" alt="{{ $details['name'] }}">
                        </div class="col">

                        <div class="col">
                            <p>{{ $details['name'] }}</p>
                            <p>{{ $details['price'] }}</p>
                            <p>{{ $details['description'] }}</p>
                        </div class="col">

                   <div class="col">
                        <form action="{{ route('basket.update', $id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Decrease Button -->
                            <button type="submit" name="action" value="decrease" class="btn btn-danger">-</button>

                            <!-- Display Quantity -->
                            <input type="text" name="quantity" value="{{ $details['quantity'] }}" readonly size="2">

                            <!-- Increase Button -->
                            <button type="submit" name="action" value="increase" class="btn btn-success">+</button>
                        </form>
                    </div>

                    <div class="col">
                        <p>Total: €{{ $details['price'] * $details['quantity'] }}</p>
                    </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection