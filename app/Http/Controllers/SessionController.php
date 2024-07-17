<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view('pasien.pasienlogin');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Nomor telepon wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('pasien')->attempt($infologin)) {
            return redirect()->intended('/dashboardpasien');
        } else {
            return redirect()->route('pasienlogin.index')->with('error', 'Nomor telepon atau password salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('pasien')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
