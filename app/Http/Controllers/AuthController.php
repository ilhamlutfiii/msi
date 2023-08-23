<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'user_nid' => 'required',
            'password' => 'required'
        ], [
            'user_nid.required' => 'User NID wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'user_nid' => $request->user_nid,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Selamat, Anda Berhasil Login.');
        } else {
            return redirect()->route('login_page')->with('login_failed', 'User NID atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login_page')->with('logout', 'Anda telah keluar.');
    }
}
