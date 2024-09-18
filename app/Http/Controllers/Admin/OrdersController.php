<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user', 'status')
                    ->orderBy('created_at')
                    ->get();       

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        $users = User::all();
        $statuses = Status::all();

        return view('admin.orders.form', compact('order','users','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdersRequest $request)
    {
        $attributes = $request->validated();

        Order::create($attributes);

        return redirect()->route('admin.orders.index')->with(
            'status', 'The order was successfully created.'
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $users = User::orderBy('name')->get();
        $statuses = Status::orderBy('name')->get();

        return view('admin.orders.form', compact('order','users','statuses'));
    }


    public function show(Order $order)
    {   
        $order->load('user', 'status', 'purchases');  

        return view('admin.orders.show', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdersRequest $request, Order $order)
    {
        $attributes = $request->validated();

        $order->update($attributes);

        return redirect()->route('admin.orders.index')->with(
            'status', 'The order was successfully updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with(
            'status', 'The order was successfully deleted.'
        );
    }
}
