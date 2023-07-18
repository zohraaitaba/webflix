<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //valider email et mot de passe 
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/films');
        }

        return back()->withErrors([
            'email'=> 'Identifiants invalids.',

        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
