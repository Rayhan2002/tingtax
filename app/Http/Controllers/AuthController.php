<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            session(['username' => $user->name]);

            // Tambahkan status login ke dalam session
            session(['is_logged_in' => true]);

            return redirect('admin');
        } else {
            return redirect('/login')->withErrors('Username atau Password yang Dimasukkan Tidak Sesuai')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('is_logged_in');
        return redirect('/');
    }
}
