<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(Auth::attempt($validatedData))
        {
            $request->session()->regenerate();

            return redirect()->intended();
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->onlyInput('email');
    }

    public function create()
    {
        return view('auth.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $password = Hash::make($validatedData['password']);
        $u = new User;

        $u->name = $validatedData['name'];
        $u->email = $validatedData['email'];
        $u->password = $password;

        $u->save();

        return redirect('/');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerate();

        $request->session()->regenerateToken();


        return redirect('/');
    }
}
