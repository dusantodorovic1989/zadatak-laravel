<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login()
    {   
        if(!auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                'massage' => 'Omasio si sifru.Ckode'
            ]);
        }
        

        return redirect('/posts');
    }
    public function logout()
    {
        auth()->logout();


        return redirect('/posts');
    }
}
