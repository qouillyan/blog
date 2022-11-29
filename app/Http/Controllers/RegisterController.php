<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
        $this->middleware('check.age')->only('store');
    }

    public function create() {
        return view('auth.register');
    }

    public function store() {
        // Validiram inpute
        $this->validate(
            request(),
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );

        // Upisujem korisnika u bazu
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Logujem korisnika
        auth()->login($user);

        // Redirektujem na /posts
        return redirect('/posts');
    }
}
