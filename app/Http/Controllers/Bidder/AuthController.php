<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use App\Models\Bidder;
use App\Mail\Bidder\PasswordResetLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Tampilkan form yg berisi:
    // - Input email
    // - Input password
    // - Tombol login
    public function login()
    {
        if (Auth::guard('bidder')->check()) {
            return redirect()->route('bidder.home');
        }

        return view('bidder.auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::guard('bidder')->check()) {
            return redirect()->route('bidder.home');
        }

        if (!Auth::guard('bidder')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return back()->withErrors(['error' => 'Invalid login credentials'])->withInput();
        }

        return redirect()->route('bidder.home')->with('success', 'Welcome back, '.$this->bidder()->nama.'!');
    }

    // Tampilkan form yg berisi:
    // - Input nama
    // - Input email
    // - Input password
    // - Input konfirmasi password
    // - Tombol register
    public function register()
    {
        return view('bidder.auth.register');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:72',
            'password_confirmation' => 'required|same:password'
        ]);

        $bidder = new Bidder();
        $bidder->id = (string)Str::uuid();
        $bidder->nama = $input['nama'];
        $bidder->email = $input['email'];
        $bidder->password = Hash::make($input['password']);
        $bidder->no_telepon = '-';
        $bidder->alamat = '-';
        $bidder->save();

        return redirect()->route('bidder.auth.login')->with('success', 'Registration completed. Now you can login using your credentials');
    }

    public function logout()
    {
        Auth::guard('bidder')->logout();
        return redirect()->route('bidder.home')->with('success', 'Logged out successfully');
    }

    // Tampilkan form yg berisi:
    // - Input email
    // - Tombol "reset password"
    public function forgot()
    {
        return view('bidder.auth.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $bidder = Bidder::fromEmail($request->input('email'));
        if (!isset($bidder)) {
            return back()->withErrors(['error' => 'Bidder not found'])->withInput();
        }

        Mail::to($bidder->email)->send(new PasswordResetLink($bidder));

        return redirect()->route('bidder.home')->with('success', 'A password reset link has been sent to your e-mail. Please check them periodically');
    }

    // Tampilkan form yg berisi:
    // - Input password baru
    // - Input konfirmasi password baru
    // - Tombol submit
    public function reset(Request $request)
    {
        $bidder = Bidder::fromPasswordReset($request);
        if (!isset($bidder)) {
            return redirect()->route('bidder.home')->withErrors(['error' => 'Invalid password reset link']);
        }

        $resetUrl = $request->fullUrl();

        return view('bidder.auth.reset', compact('bidder', 'resetUrl'));
    }

    public function doResetPassword(Request $request)
    {
        $bidder = Bidder::fromPasswordReset($request);
        if (!isset($bidder)) {
            return redirect()->route('bidder.home')->withErrors(['error' => 'Invalid password reset link']);
        }

        $input = $request->validate([
            'password' => 'required|min:8|max:72',
            'password_confirmation' => 'required|same:password'
        ]);

        $bidder->password = Hash::make($input['password']);
        $bidder->save();

        return redirect()->route('bidder.auth.login')->with('success', 'Password has been reset successfully');
    }

    // Tampilkan identitas bidder (nama dan email)
    // Tampilkan form yg berisi:
    // - Input password baru*
    // - Input konfirmasi password baru*
    // - Input nomor telepon
    // - Input alamat rumah
    // - Tombol simpan
    // *) password bidder akan terganti apabila input tidak kosongan
    public function profile()
    {
        $bidder = $this->bidder();

        return view('bidder.auth.profile', compact('bidder'));
    }

    public function update(Request $request)
    {
        $input = $request->validate([
            'password' => 'nullable|min:8|max:72',
            'password_confirmation' => 'required_with:password|same:password',
            'no_telepon' => 'required',
            'alamat' => 'required'
        ]);

        $bidder = $this->bidder();

        if ($request->filled('password')) {
            $bidder->password = Hash::make($input['password']);
        }

        $bidder->no_telepon = $input['no_telepon'];
        $bidder->alamat = $input['alamat'];

        $bidder->save();

        return back()->with('success', 'Profile updated successfully');
    }
}
