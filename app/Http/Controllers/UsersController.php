<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('users.edit', [
            'user' => auth()->user()
        ]);
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $attributes = $request->validate([
           'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user)],
           'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        $user->update($attributes);

        return redirect()->back()->with('success_message', 'Profile Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $attributes = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user->update($attributes);

        return redirect()->back()->with('success_message', 'Password Updated Successfully');
    }

}
