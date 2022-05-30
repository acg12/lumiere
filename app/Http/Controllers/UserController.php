<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('signup');
    }

    public function signup(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        User::create(['name' => $name, 'email' => $email, 'password' => $password]);

        auth()->attempt(['email' => $email, 'password' => $password]);

        return redirect('/');
    }

    public function login(Request $request) {
        $email = $request->email;
        $pass = $request->password;
        if(auth()->attempt(['email' => $email, 'password' => $pass])) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('login');
    }
}
