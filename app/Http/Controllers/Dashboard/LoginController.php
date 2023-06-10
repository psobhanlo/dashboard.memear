<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        dd($request->all());
        $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('mobile', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('panel.index')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
