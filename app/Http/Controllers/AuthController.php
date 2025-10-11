<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect sesuai role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
    public function showRegistrationForm()
    {
        return view('auth.registrasi');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'about' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'about' => $request->about,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'buyer',
        ]);

        // Optionally, login the user after registration
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
