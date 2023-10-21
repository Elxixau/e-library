<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    function index ()
    {
        return view("sesi/log");
    }
    
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)){
            $user = Auth::user(); 
            $namaPengguna = $user->name;

            return redirect()->route('admin')->with('success', 'Selamat datang ' . $namaPengguna);
        } 
            return redirect()->route('log')->with('error', 'Email atau password salah, silahkan coba lagi.');
    }  
    
    function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('log')->with('success', 'Berhasil Logout');
    }   


}