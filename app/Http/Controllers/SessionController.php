<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // Attempt to authenticate the user
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);
        }

        // Redirect the user
        return redirect('/');
    }
}
