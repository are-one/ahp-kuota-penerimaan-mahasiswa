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
            'name'   => 'required|min:2',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('/home')->with('status', 'Anda Berhasil Login');
        }
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
