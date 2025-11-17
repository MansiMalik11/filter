<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
       $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|unique:users',
        'password' => 'required|string|min:8|confirmed'
       ]);

       User::create($validated);
       
    }

    public function login() {
       
    }

}
