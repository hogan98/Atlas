@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container">
    <h3 class="text-3xl py-3 text-center">
        {{ $category->exists ? 'Edit a Category' : 'Add a Category'}}
    </h3>

    <form action="/admin/categories{{ $category->exists ? '/' . $category->id : null }}" enctype="multipart/form-data" method="POST">
        @csrf

        @if($category->exists)
            @method('PATCH')
        @endif


        <div>
            <label for="title" class="my-2">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $category->title) }}" >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="slug" class="my-2">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" >
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection