<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function store(){
        //validate the user
        $attributes = request()->validate([
            'email' => 'required|email',//exists:users,email',
            'password' => 'required'
        ]);
        //attempt to authenticate the user
        //if all goes well we hit here
        if(auth()->attempt($attributes)){

            //if not, redirect back
            //session fixation can be avioded with below code
            session()->regenerate();
            //session hijacking

            return redirect('/')->with('success', 'Welcome Back!');
        }
        //based on provided credentials
        //if not, redirect back
//        throw ValidationExecption::withMessages([
//            'email' => 'Your provided credentials could not be verified.'
//        ]);
        return back()->withErrors("Your provided credentials could not be verified.");
    }
    public function create(){
        return view('sessions.create');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
