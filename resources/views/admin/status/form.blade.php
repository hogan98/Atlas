@extends('layouts.app')

@section('title', 'Status')

@section('content')

<div class="container">
    <h3 class="text-3xl py-3 text-center">
        {{ $status->exists ? 'Edit a Status' : 'Add a Status'}}
    </h3>

    <form action="/admin/status{{ $status->exists ? '/' . $status->id : null }}" enctype="multipart/form-data" method="POST">
        @csrf

        @if($status->exists)
            @method('PATCH')
        @endif

        <div>
            <x-form-input id="name" name="name" value="{{ $status->name }}" label="Name" error="{{ $errors->first('name') }}" />
            <x-form-input id="colour" name="colour" type="select" :value="$status->colour" :options="$colours" label="Colour" />
        </div>

        <button type="submit" class="btn-primary btn mt-3">Save Changes</button>
    </form>
</div>

@endsection