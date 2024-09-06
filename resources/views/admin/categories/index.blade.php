@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container">
    <h1 class="text-center">Categories</h1>
        
    <div class="mb-4">
        <a class="btn btn-primary text-white" href="{{ route('admin.categories.create') }}">Add a Category</a>
    </div>

    <div class="table-responsive">
        @if(count($categories))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Title
                        </th>
                        <th scope="col">
                            Slug
                        </th>
                        <th scope="col">
                            Created At
                        </th>
                        <th scope="col">
                            Updated At
                        </th>
                        <th scope="col">
                            Options
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                {{ $category->slug }}
                            </td>
                            <td>
                                {{ $category->created_at }}
                            </td>
                            <td>
                                {{ $category->updated_at }}
                            </td>
                            <td>
                                <form action="POST" action={{ route('admin.categories.destroy', $category) }}>
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        @else
            <p>
                There are no categories at the moment.
            </p>
        @endif
    </div>
</div>
@endsection