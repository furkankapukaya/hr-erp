<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use \Session;

class LoginController extends Controller
{    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $users = \App\User::all();
        foreach ($users as $user) {
            if($user->password == $password && $user->email == $email){
                Auth::login($user,true);
                return redirect()->action('EmployeeController@index');
            }
        }
        return back()->withErrors(['field_name' => ['Invalid User Informations.']]);
    }

    public function logout()
    {
        Auth::logout();
       //dd(Auth::check());
       // Session::flash('message', "Logged out.");

        return redirect('login')->with(['message' => "Logged out."]);
    }

}







