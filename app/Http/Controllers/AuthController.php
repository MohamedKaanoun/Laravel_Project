<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register User
  public function register(Request $request)
{
    $data = $request->validate([
        'username' => ['required', 'max:20'],
        'email' => 'required|email|max:255|unique:users,email',
        'password' => ['required', 'min:8', 'confirmed'],
        'password_confirmation' => ['required'],
        'latitude' => ['required', 'numeric'], // Require latitude to be present and numeric
        'longitude' => ['required', 'numeric'], // Require longitude to be present and numeric
    ]);

    $user = User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'latitude' => $data['latitude'],
        'longitude' => $data['longitude'],
    ]);

    Auth::login($user);

    return redirect()->route('home');
}


    // Login User
    public function login(Request $request){
        // Validate
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => ['required'],
        ]);

        // Try to log in
        if(Auth::attempt($data , $request->remember)){
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'Username or password are not correct'
            ]);
        };
    }

    // Logout User
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect(route('login'));
    }

    public function contactMe(){
        return redirect(view('contactMe'));
    }
}

