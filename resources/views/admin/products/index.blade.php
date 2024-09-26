@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container">
    <h1 class="text-center">Products</h1>
        
    <div class="mb-4">
        <a class="btn btn-primary text-white" href="{{ route('admin.products.create') }}">Add a Product</a>
    </div>

    <div class="table-responsive">
        @if(count($products))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Description
                        </th>
                        <th scope="col">
                            Price
                        </th>
                        <th scope="col">
                            Slug
                        </th>
                        <th scope="col">
                            Image
                        </th>
                        <th scope="col">
                            In Stock
                        </th>
                        <th scope="col">
                            Category
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
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>

                            <td>
                                {{ $product->slug }}
                            </td>
                            
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                {{ $product->in_stock ? 'Yes' : 'No' }}
                            </td>
                            <td>
                                {{ $product->category->title }}
                            </td>
                            <td>
                                {{ $product->created_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                {{ $product->updated_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                <form method="POST" action={{ route('admin.products.destroy', $product) }}>
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-success mb-1">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>
                There are no products at the moment.
            </p>
        @endif
    </div>
</div>
@endsection
