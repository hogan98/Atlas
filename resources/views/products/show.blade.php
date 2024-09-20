@extends('layouts.app')

@section('title', 'Orders')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Products</h1>
    <div class="row mt-5">
        <div class="col-12 col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }} loading="lazy"">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">€{{ $product->price }}</p>
                    <a href="{{ route('products.show', $product) }}" class="btn green-custom-btn text-white fw-bold">View</a>
                    <a href="#" class="btn purple-custom-btn text-white fw-bold ms-auto">Add to basket</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection