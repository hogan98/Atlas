<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index' ,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();

        return view('admin.categories.form', compact('category'));
    }

    public function store(CategoriesRequest $request){
        $attributes = $request->validated();

        Category::create($attributes);

        return redirect()->route('admin.categories.index')->with(
            'status', 'The category was successfully created.'
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, Category $category)
    {
        $attributes = $request->validated();
       
        $category->update($attributes);

        return redirect()->route('admin.categories.index')->with(
            'status', 'The category was successfully updated.'
        );
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with(
            'status', 'The category was successfully deleted'
        );
    }
}
