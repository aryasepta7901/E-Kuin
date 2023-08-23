<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Login Manual
    public function login(Request $request)
    {
        $request->validate(
            [
                'nip' => 'required',
                'password' => 'required',

            ],
            [
                'required' => ':Attribute Wajib di Isi',
            ]
        );
        $findUser = User::where('id', strval($request->nip))->first();
        if ($findUser && Hash::check($request->password, $findUser->password)) {

            Auth::login($findUser);

            return redirect()->intended('/kontrak');
        }
        // Jika gagal
        return back()->with('loginError', 'Login Gagal!');
    }
}
