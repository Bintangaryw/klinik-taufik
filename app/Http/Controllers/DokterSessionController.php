<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterSessionController extends Controller
{
    function index()
    {
        return view('dokter.dokterlogin');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi!'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('dokter')->attempt($infologin)) {
            return redirect()->intended('/dokterdashboard');
        } else {
            return redirect('/dokterlogin')->with('error', 'Email atau password salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('dokter')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dokterlogin');
    }
}
