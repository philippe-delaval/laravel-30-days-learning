<?php

namespace App\Http\Controllers;

class RegisteredUserController extends Controller
{
    public function store()
    {
        // Validate the user
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        // Create the user
        $user = User::create($attributes);

        // Sign the user in
        auth()->login($user);

        // Redirect the user
        return redirect('/');
    }

    public function create()
    {
        return view('auth.register');
    }
}
