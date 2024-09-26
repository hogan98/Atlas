@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container mt-5">
    <form action="{{ route('checkout.store') }}" method="POST" class="pt-3">
         @csrf
    <div class="row">

        <!-- Left Section: Contact Details -->
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="fw-bold">Contact Details</h5>

                   

                    <x-form-input id="name" name="name" label="Name" error="{{ $errors->first('name') }}" />
                    <x-form-input id="email" name="email" label="Email" error="{{ $errors->first('email') }}" />
                    <x-form-input id="phone" name="phone" label="Phone" error="{{ $errors->first('phone') }}" />
                    <x-form-input id="address" name="address" label="Address" error="{{ $errors->first('address') }}" />
                    {{-- <div class="mb-3">
                        <label for="name" class="form-label fw-bold"><span style="color:#4cdaa6">*</span>Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div> --}}
            </div>
        </div>

        <!-- Right Section: Order Summary -->
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="fw-bold">Summary</h5>

                @if(count($basket) > 0)
                    @php $total = 0; @endphp

                    @foreach($basket as $id => $details)
                        <div class="grid-item img">
                            <img src="{{ asset('storage/' . $details['image']) }}" width="100px" height="100px" alt="{{ $details['name'] }}">
                        </div>

                        <div class="grid-item">
                            <p>{{ $details['name'] }}</p>
                            <p>€ {{ $details['price'] }}</p>
                            <p>{{ $details['description'] }}</p>
                        </div>

                        @php
                            $total += $details['price'] * $details['qty'];
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
                            <button type="submit" class="btn li-green-custom-btn px-2 py-2">Place Order</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
    </div>
</form>
</div>

@endsection
