@extends('layouts.app')

@section('content')

@guest
<div class="header" style="position: relative; text-align: left; color: black;">
    <img src="{{ asset('storage/images/dock-header.jpg') }}" style="height:550px; width:100%; opacity:40%;" alt="">
    <div class="header-content">
        <p class="header-big-text" style="font-weight: bold;">
            Quick line about product big text.
        </p>
        <p class="header-small-text">
            Quick line about product smaller text.
        </p>
        <button class="btn green-custom-btn px-4" style="color:white; font-weight:bold;">Shop now</button>
    </div>
</div>

<div class="container mt-5">
    <h1 class="text-center">Products</h1>
    <div class="row mt-5">
        @foreach ($products as $product)
        <div class="col-12 col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }} loading="lazy"">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">€{{ $product->price }}</p>
                    <a href="{{ route('home.show', $product) }}" class="btn green-custom-btn text-white fw-bold">View</a>
                    <a href="#" class="btn purple-custom-btn text-white fw-bold ms-auto">Add to basket</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endguest
@endsection
