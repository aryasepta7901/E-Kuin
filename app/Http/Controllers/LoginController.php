<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login Manual
    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'id' => 'required',
                'password' => 'required',

            ],
            [
                'id.required' => 'NIP Wajib di Isi',
                'password.required' => 'Password Wajib di Isi',
            ]
        );
        // $findUser = User::where('id', strval($request->nip))->first();

        if (Auth::attempt($credentials)) {

            // if ($findUser && Hash::check($request->password, $findUser->password)) {
            $request->session()->regenerate();
            return redirect()->intended('/kontrak');
        }
        // Jika gagal
        return back()->with('loginError', 'Login Gagal!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
