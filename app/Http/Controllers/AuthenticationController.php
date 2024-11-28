<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthenticationController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication/forgotPassword');
    }

    public function login()
    {
        return view('authentication/signIn');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8' 
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('companies.index'))->with('success','Authentication was successfull');
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials.Please try again with correct one.',
        ]);

        
    }

    public function signUp()
    {
        return view('authentication/signUp');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->regenerate();

        return redirect(route('login'))->with('success','goodbye');
    }
}
