<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\UserServiceInterface;
// use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService) {
        $this->userService = $userService;
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        echo"dsgyju";die;
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // $user = User::create($validated);
        $user = $this->userService->registerUser($validated);
        Auth::login($user);

        return redirect()->route('products.view')->with('success', 'Registration successful. Check your email!');
    }

    public function login(Request $request) {
       $validated = $request->validate([
        'email'    => 'required|string',
        'password' => 'required|string'
       ]);

       if(Auth::attempt($validated)){
        $request->session()->regenerate();
        return redirect()->route('products.view');
       }

       throw ValidationValidationException::withMessages([
        'credientials' => 'Sorry , incorrect credientials'
       ]);
    }

    public function logout(Request $request) {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }

}
