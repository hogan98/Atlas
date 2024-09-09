<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('admin.users.index' ,compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(UsersRequest $request, User $user)
    {
        
        $attributes = $request->validated();
       
        $user->update($attributes);

        return redirect()->route('admin.users.index')->with(
            'status', 'The user was successfully updated.'
        );
    
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with(
            'status', 'The user was successfully deleted'
        );
    }
}
