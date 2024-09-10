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
            <label for="name" class="my-2">Name</label>
            <input type="text" id="name" name="name" class="form-control @error('title') is-invalid @enderror" value="{{ old('name', $product->name) }}" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        
            <label for="description" class="my-2">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $product->description) }}" >
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="price" class="my-2">Price</label>
            <input type="number" min="0" id="price" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" >
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="image" class="my-2">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="my-2">
                <label for="in_stock" class="my-2">In Stock</label>
                <input type="hidden" name="in_stock" value="0">
                <input type="checkbox" id="in_stock" name="in_stock" class="checkbox" value="1" {{ old('in_stock', $product->in_stock) == 1 ? 'checked' : '' }}>
                @error('in_stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <label for="category_id" class="my-2">Category</label>
            <select name="category_id" class="form-control">
                <option {{ old('category_id', $product->category_id) ? '' : 'selected' }}>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection

