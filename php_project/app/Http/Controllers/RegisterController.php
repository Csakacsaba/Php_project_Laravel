<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('session.register');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'name' => 'required|max:255',
                'password' => 'required|max:255|min:5|confirmed',
                'email' => ['required', 'email', Rule::unique('users')],
                'phone' => ['required', Rule::unique('users')],
                'address' => 'required|min:5',
            ]);

            $user = \App\Models\User::create($attributes);

            auth()->login($user);

            return redirect('/')->with('message', 'Registration is successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Your email or phone number already exists');
        }
    }
}
