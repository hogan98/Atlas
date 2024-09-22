<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basket = session()->get('basket', []); // Retrieve basket items from session
        $product = Product::orderBy('name')->get();

        return view('basket.index', compact('basket','product')); // Pass basket data to view
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Find the product
        $product = Product::findOrFail($request->product_id);

        // Get the basket from session, or create an empty array if not found
        $basket = session()->get('basket', []);

        // If the product is already in the basket, increase the quantity
        if (isset($basket[$product->id])) {
            $basket[$product->id]['quantity']++;
        } else {
            // Otherwise, add the product to the basket with quantity 1
            $basket[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
                'description' => $product->description, 
            ];
        }

        // Save the basket back into the session
        session()->put('basket', $basket);

        return redirect()->back()->with('success', 'Product added to basket!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

 

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    // Get the basket from the session
    $basket = session()->get('basket', []);

    // Check if the product exists in the basket
    if (isset($basket[$id])) {

        // Handle the increase and decrease actions
        if ($request->action == 'increase') {
            $basket[$id]['quantity'] += 1; 
        } elseif ($request->action == 'decrease') {
            
            if ($basket[$id]['quantity'] > 1) {
                $basket[$id]['quantity'] -= 1; 
            } else {
                unset($basket[$id]); // Remove product from basket if quantity is 0
            }
        }

        // Update the session with the modified basket
        session()->put('basket', $basket);

        return redirect()->back()->with('success', 'Basket updated successfully!');
    }

    // If product is not in the basket
    return redirect()->back()->with('error', 'Product not found in basket.');
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$id])) {
            unset($basket[$id]);

            session()->put('basket', $basket);

            return redirect()->back()->with('success', 'Product removed from basket.');
        }

        return redirect()->back()->with('error', 'Product not found in basket.');
    }
}
