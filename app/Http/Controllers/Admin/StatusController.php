<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::orderBy('name')->get();

        return view('admin.status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new Status();
        $colours = Status::pluck('colour', 'colour');

        return view('admin.status.form', compact('status','colours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        $attributes = $request->validated();

        Status::create($attributes);

        return redirect()->route('admin.status.index')->with(
            'status', 'The status was successfully created.'
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        $colours = Status::pluck('colour', 'colour');
        return view('admin.status.form', compact('status','colours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, Status $status)
    {
        $attributes = $request->validated();

        $status->update($attributes);

        return redirect()->route('admin.status.index')->with(
            'status', 'The status was successfully updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('admin.status.index')->with(
            'status', 'The status was successfully deleted.'
        );
    
    }
}
