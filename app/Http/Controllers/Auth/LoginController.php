<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function show()
    {
        return Inertia::render('Auth/Login');
    }
    
    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Attempt to log the user in
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Redirect to admin dashboard
            return redirect()->intended('/admin/dashboard');
        }
        
        // If login fails, return back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
