<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AccountController extends Controller
{
    public function login() {
        return view('login'); // Assuming you have a login view called 'login' in your resources/views directory
    }

    public function register() {
        
    }

    public function logout() {
        
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }
        
        return redirect()->back()->with('error', 'Email or password is incorrect');
    }

    public function registerPost(Request $request) {
        
    }

    public function dashboard() {
       return view('dashboard'); 
    }
}