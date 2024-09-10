<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('name')->get();
        $products = Product::with('category')->orderBy('name')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();

        return view('admin.products.form', compact('product','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request)
    {
        $attributes = $request->validated();

        Product::create($attributes);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $attributes['image'] = $path;
        }

        return redirect()->route('admin.products.index')->with(
            'status', 'The product was successfully created.'
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('title')->get();
        return view('admin.products.form', compact('product', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, Product $product)
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $attributes['image'] = $path;
        }

        $product->update($attributes);

        return redirect()->route('admin.products.index')->with(
            'status', 'The product was successfully updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with(
            'status', 'The product was successfully deleted.'
        );
    }
}
