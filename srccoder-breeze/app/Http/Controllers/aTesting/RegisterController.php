<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    
   public function index(){
       return view('register.index');
   }
    public function create(){
        //return 'hello register';
           return view('register.create');
    }

    public function store(){
//        validate the user
//        return \request()->all();
//        var_dump(request()->all());
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:7'
        ]);
        //if validation fails laravel will redirect back to the same page and never reach the code below
//        dd('success validation success');

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);
//        flash message
//        session()->flash('success', 'Your account has been created.');
//        return redirect('/');
        //sign them in
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');

//        return redirect('/')->with('success', 'Your account has been created.');
//        //persist the user
//        // $attributes['password'] = bcrypt($attributes['password']);
//        $user = User::create($attributes);
//        //sign them in
//        auth()->login($user);
//        //redirect
//        return redirect('/')->with('success', 'Your account has been created.');
    }
}
