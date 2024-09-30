<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use PharIo\Manifest\Email;

class SessionController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        $attributes = $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required',Password::min('6')]
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=> 'credentials dont match'
            ]);
        }
        $request->session()->regenerate();
        return redirect('/');
        
    }

    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
