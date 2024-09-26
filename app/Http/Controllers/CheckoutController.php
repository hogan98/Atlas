<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basket = session()->get('basket', []); // Retrieve basket items from session
        $product = Product::orderBy('name')->get();

        return view('checkout.index', compact('basket','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CheckoutRequest $request)
    {
        $attributes = $request->validated();

        $order = Order::create($attributes);

        // let's loop through the basket session and save to purchases
        foreach (session()->get('basket') as $item) {
            $order->purchases()->create($item);
        }

        return redirect('/')->with(
            'status', 'The order was successfully placed.'
        );
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
