<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class AuthenticationController extends Controller
{


    function login(Request $re)
    {

        $method = $re->method();

        if ($method === "POST") {

            $credentials = $re->validate([

                "email" => "required|email:dns",
                "password" => "required",

            ]);


            if (Auth::attempt($credentials)) {

                session()->regenerate();

                return redirect()->intended('my_blogs');
            } else {


                return back()->withErrors(["form-error" => 'No account with matching credentials']);
            }
        } elseif ($method === "GET") {

            return view('auth.login');
        }

        abort(405);
    }

    function signup(Request $request)
    {

        if ($request->method() === "GET") {

            return view('auth.signup');
        } elseif ($request->method() === "POST") {

            $validated_data = $request->validate([
                "email" => "required|email:dns|unique:users",
                "name" => "required",
                "username" => "required|unique:users",
                "password" => "required|confirmed|min:5",
            ]);

            $validated_data['password'] = bcrypt($validated_data['password']);
            User::create($validated_data);

            return redirect(route("login"));
        }

        abort(405);
    }

    function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('login');
    }
}