<?php

namespace App\Http\Controllers;

use App\Models\Srccoder;
use Illuminate\Http\Request;

class SrcCoderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return the index page
        return view('srccoder.index');
    }

    public function about()
    {
        //return the about page
        return view('srccoder.about');
    }
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

            return redirect('/srccoder')->with('success', 'Welcome Back!');
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
