<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.adminlogin');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi!'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($infologin)) {
            return redirect()->intended('/admindashboard');
        } else {
            return redirect('/admin-klinik-loginform')->with('error', 'Username atau password salah.');
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin-klinik-loginform');
    }
}
