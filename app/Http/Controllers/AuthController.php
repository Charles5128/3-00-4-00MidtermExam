<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationEmail;

use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function verifyEmail($id)
{
    $user = User::findOrFail($id);
    $user->email_verified_at = now();
    $user->save();

    return redirect('/')->with('success', 'Email verified successfully!');
}
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);
    
        $login = Auth::attempt($request->only('email','password'));
    
        if($login) {
            return redirect('/products');
        }
    
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function registrationForm() {
        return view('register');
    }
    public function register(Request $request) {
        $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        $user = User::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
    
        Mail::to($user->email)->send(new RegistrationEmail($user));
    
        return redirect('/')->with('success', 'Registration successful! Please check your email for verification.');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}

