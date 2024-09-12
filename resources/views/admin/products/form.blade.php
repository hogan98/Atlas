@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container">
    <h3 class="text-3xl py-3 text-center">
        {{ $product->exists ? 'Edit a Product' : 'Add a Product'}}
    </h3>

    <form action="/admin/products{{ $product->exists ? '/' . $product->id : null }}" enctype="multipart/form-data" method="POST">
        @csrf

        @if($product->exists)
            @method('PATCH')
        @endif

        <div>
            <x-form-input id="name" name="name" :value="$product->name" label="Name" error="{{ $errors->first('name') }}" />
        
            <x-form-input id="description" name="description" :value="$product->description" label="Description" error="{{ $errors->first('description') }}" />

            <x-form-input type="number" min="0" step="0.01" id="price" name="price" :value="$product->price" label="Price" error="{{ $errors->first('price') }}" />

            <x-form-input type="file" id="image" name="image" :value="$product->image" label="Image" error="{{ $errors->first('image') }}" />
    
            <x-form-input type="checkbox" id="in_stock" name="in_stock" value="1" label="In Stock" :checked="old('in_stock', $product->in_stock) == 1"/>

            <x-form-input id="category_id" name="category_id" type="select" :value="$product->category_id" :options="$categories->pluck('title', 'id')" label="Category" />
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection

