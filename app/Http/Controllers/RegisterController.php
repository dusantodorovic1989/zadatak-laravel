<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {   

        $this->validate(
            request(),
            User::VALIDATION_RULES
        );
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();/// ovaj deo koda je za cuvanje u bazu

        //$user = User::create(request()->all()); stari nacin kreiranja korisnika i cuvanja u bazu
        auth()->login($user);

        return redirect('/posts');
    }
}
