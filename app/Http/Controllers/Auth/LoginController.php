<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function serve() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if(Auth::attempt($request->only(['email', 'password']), true)) {
            return redirect()->route('home');
        }
        else return redirect()->back()->withErrors(['auth' => 'Wrong email or password']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
