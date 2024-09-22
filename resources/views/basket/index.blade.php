@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center py-3">My Basket</h1>
        <div class="basket-container">
            @if(count($basket) > 0)
                @php
                    $total = 0;
                @endphp

                <!-- Grid Layout Container -->
                <div class="grid-container">
                    <!-- Basket Items -->
                    @foreach($basket as $id => $details)
                        <div class="grid-item img">
                            <img src="{{ asset('storage/' . $details['image']) }}" width="100px" height="100px" alt="{{ $details['name'] }}">
                            <form method="POST" action={{ route('basket.destroy', $id) }}>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirmDelete()">Remove</button>
                            </form>
                        </div>

                        <div class="grid-item">
                            <p>{{ $details['name'] }}</p>
                            <p>€ {{ $details['price'] }}</p>
                            <p>{{ $details['description'] }}</p>
                        </div>

                        <div class="grid-item quantity-item pt-md-5">
                            <form action="{{ route('basket.update', $id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="action" value="decrease" class="btn btn-danger btn-sm px-2">-</button>

                                <input type="text" name="quantity" value="{{ $details['quantity'] }}" readonly size="2">

                                <button type="submit" name="action" value="increase" class="btn btn-success btn-sm px-2">+</button>
                            </form>
                        </div>

                        @php
                            $total += $details['price'] * $details['quantity'];
                        @endphp
                    @endforeach

                    <div class="grid-total">
                        <div class="total-row">
                            <div class="sub-col mt-3">
                                <p>Subtotal: <strong>€{{ $total }}</strong></p>
                                <hr>
                            </div>
                        </div>
                        <div class="button-row">
                            <p><strong>Total: <span>€{{ $total }}</span></strong></p>
                            <button class="btn li-green-custom-btn px-2 py-2">Checkout Securely</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection