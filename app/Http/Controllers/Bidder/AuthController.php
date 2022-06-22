<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan form yg berisi:
    // - Input email
    // - Input password
    // - Tombol login
    public function login()
    {
        return view('bidder.auth.login');
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

    // Tampilkan form yg berisi:
    // - Input email
    // - Tombol "reset password"
    public function forgot()
    {
        return view('bidder.auth.forgot');
    }

    // Tampilkan form yg berisi:
    // - Input password baru
    // - Input konfirmasi password baru
    // - Tombol submit
    public function reset()
    {
        return view('bidder.auth.reset');
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
        return view('bidder.auth.profile');
    }
}
