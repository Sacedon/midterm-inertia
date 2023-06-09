<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home() {
        
        return inertia('Home',[
            'topics'=>[
                'Laravel', 'Inertia', 'VueJS'
            ]
        ]);
    }

    public function loginForm() {
        return inertia('Login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = auth()->attempt($request->all());

        if($login)
           return redirect('/companies');
        else
           return back()->withErrors(['authentication'=>'Invalid username and/or password']);
    }

    public function index() {
        return inertia('inputs/Index');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

}
