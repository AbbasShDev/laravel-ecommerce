<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller {

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        return view('users.edit', [
            'user' => auth()->user(),
            'categories' => Category::latest()->get(),
        ]);
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $attributes = $request->validate([
            'name'  => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user)],
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

    public function updateAddress(Request $request)
    {
        $user = auth()->user();

        $attributes = $request->validate([
            'shipping_address' => ['required', 'string'],
            'shipping_city' => ['required', 'string' ],
            'shipping_province' => ['required', 'string'],
            'shipping_postalcode' => ['required', 'string'],
            'shipping_phone' => ['nullable', 'min:10'],
        ]);

        $user->update($attributes);

        return redirect()->back()->with('success_message', __('general.address_updated_successfully'));
    }

}
