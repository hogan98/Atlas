@extends('layouts.app')

@section('title', 'Orders')

@section('content')

<div class="container">
    <h3 class="text-3xl py-3 text-center">
        {{ $order->exists ? 'Edit a Order' : 'Add a Order'}}
    </h3>

    <form action="/admin/orders{{ $order->exists ? '/' . $order->id : null }}" enctype="multipart/form-data" method="POST">
        @csrf

        @if($order->exists)
            @method('PATCH')
        @endif
        
        <div>
            <x-form-input id="name" name="name" label="Name" :value="$order->name" error="{{ $errors->first('name') }}" />

            <x-form-input id="email" name="email" label="Email" :value="$order->email" error="{{ $errors->first('email') }}" />

            <x-form-input id="phone" name="phone" label="Phone" :value="$order->phone" error="{{ $errors->first('phone') }}" />

            <x-form-input id="address" name="address" label="Address" :value="$order->address" error="{{ $errors->first('address') }}" />
            
            <x-form-input id="status_id" name="status_id" type="select" :value="$order->status_id" :options="$statuses->pluck('name', 'id')" label="Status" />

            {{-- <x-form-input id="user_id" name="user_id" type="select" :value="$order->user_id" :options="$users->pluck('name', 'id')" label="User Name" /> --}}
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection