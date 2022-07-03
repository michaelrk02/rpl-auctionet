<?php

namespace App\Http\Controllers\Auctioneer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('auctioneer')->check()) {
            return redirect()->route('auctioneer.dashboard');
        }

        return view('auctioneer.auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::guard('auctioneer')->check()) {
            return redirect()->route('auctioneer.dashboard');
        }

        if (!Auth::guard('auctioneer')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return back()->withErrors(['error' => 'Invalid login credentials'])->withInput();
        }

        return redirect()->route('auctioneer.dashboard')->with('success', 'Welcome back!');
    }

    public function logout()
    {
        Auth::guard('auctioneer')->logout();
        return redirect()->route('auctioneer.auth.login')->with('success', 'Logged out successfully');
    }
}
