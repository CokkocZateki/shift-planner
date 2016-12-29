<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Adldap;
use Auth;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only(['username', 'password']))) {
            return Redirect::route('home');
        } else {
            $request->session()->flash('notification', ['type' => 'danger', 'message' => 'Your username or password was incorrect.']);
            return Redirect::back();
        }
    }

}
