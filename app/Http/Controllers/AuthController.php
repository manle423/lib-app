<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        // Validate
        $fields = $request->validate([
            'name' => ['required','max:255'],
            'phone' => ['nullable', 'numeric'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);
        // dd($fields);

        // Register
        $user = User::create($fields);
        
        // Login
        Auth::login($user);
        
        // Redirect
        return redirect()->route('dashboard');

    }

    // Login User
    public function login(Request $request) {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Login
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }
        
    }

    // Logout User
    public function logout(Request $request) {
        // Logout the User
        Auth::logout();

        // Invalidate user's session
        $request->session()->invalidate();

        // Regenerate csrf token
        $request->session()->regenerate();

        // Redirect to login page
        return redirect()->route('login');
    }
}
