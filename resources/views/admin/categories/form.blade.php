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
            <x-form-input id="title" name="title" value="{{ $category->title }}" label="Title" error="{{ $errors->first('title') }}" />
            
            <x-form-input id="slug" name="slug" value="{{ $category->slug }}" label="Slug" error="{{ $errors->first('slug') }}" />
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection