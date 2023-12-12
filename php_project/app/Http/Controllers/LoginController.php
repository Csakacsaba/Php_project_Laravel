<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('session.login');
    }

    public function store()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (auth()->attempt($credentials)) {
            return redirect('/');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']);
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
