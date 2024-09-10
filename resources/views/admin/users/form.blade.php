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
            <x-form-input id="name" name="name" value="{{ $user->name }}" label="Name" error="{{ $errors->first('name') }}" />
                
            <x-form-input id="email" name="email" value="{{ $user->email }}" label="Email" error="{{ $errors->first('email') }}" />
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection