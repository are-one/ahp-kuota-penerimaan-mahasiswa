<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    
    public function postlogin(Request $request)
    {

        // validasi data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('/');
        }
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}