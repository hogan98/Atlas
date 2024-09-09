@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="container">
    <h3 class="text-3xl py-3 text-center">
        {{ $user->exists ? 'Edit a User' : 'Add a User'}}
    </h3>

    <form action="/admin/users{{ $user->exists ? '/' . $user->id : null }}" enctype="multipart/form-data" method="POST">
        @csrf

        @if($user->exists)
            @method('PATCH')
        @endif


        <div>
            <label for="name" class="my-2">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" >
        
            <label for="email" class="my-2">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" >
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection