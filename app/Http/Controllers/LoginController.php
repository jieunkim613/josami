<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('login', [
      "title" => "Login"
    ]);
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate(
      [
        'username' => 'required',
        'password' => 'required'
      ],
      [
        'username.required' => 'Username harus diisi.',
        'password.required' => 'Password harus diisi.',
      ]
    );

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      if (auth()->user()->level == 1) {
        return redirect()->intended('/')->with('success', 'Berhasil masuk ke akun. Selamat datang, ' . auth()->user()->name);
      } elseif (auth()->user()->level == 2) {
        return redirect()->intended('/orders')->with('success', 'Berhasil masuk ke akun. Selamat datang, ' . auth()->user()->name);
      } else {
        return redirect()->intended('/queues')->with('success', 'Berhasil masuk ke akun. Selamat datang, ' . auth()->user()->name);
      }
    }

    return back()->with('loginError', 'Gagal masuk ke akun, kesalahan pada email atau password.');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
