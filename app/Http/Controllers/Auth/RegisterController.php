<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function serve() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => [
                'required',
                Rule::in(['pasien', 'psikolog'])
            ]
        ]);

        $user = new User;
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->password = Hash::make($validatedData['password']);
        $user->email = $validatedData['email'];
        $user->is_psikolog = $validatedData['role'] == 'psikolog';
        $user->save();

        // log user in
        if(Auth::attempt($request->only(['email', 'password']))) return redirect()->route('home');
    }
}
