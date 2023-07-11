<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {

        return view("auth.register");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users',
            'password' => 'required|string',
            'age' => 'required|integer',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->age = $request->input('age');
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi sukses, selanjutnya silahkan login.');
    }

    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login sukses.');
        }

        return back()->withErrors([
            'name' => 'Data tidak sesuai.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout sukses.');
    }
}
