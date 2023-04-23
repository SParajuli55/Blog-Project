<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public function home(Request $request)
    {
        return view('auth::layouts.home');

    }

    public function index()
    {
        return view('auth::auth.register');
    }

    public function loginindex()
    {
        return view('auth::auth.admin-login');
    }


    public function create()
    {
        return view('auth::create');
    }


    public function store(UserRequest $request)
    {
        $register = new User();
        $register->name = $request->name;
        $register->phone = $request->phone;
        $register->address = $request->address;
        $register->gender = $request->gender;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->save();
        return redirect()->route('authuser.index')->with('message', 'Registered succcessfully');


    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/blog/view-blogs')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect()->route('auth.index')->withSuccess('Oppes! You have entered invalid credentials');
    }

    //     $request->validate([
    //         'email' => 'required|email|unique:users,column',
    //         'password' => 'required'
    //     ]);

    //     $user = User::where('email', '=', $request->email)->first();
    //      if($user==$request->email){
    //         if(Hash::check($request->password,$user->password)){
    //             $request->session()->put('loginId', $user->id);
    //             return redirect()->route('dashboard.index');

    //         } else{
    //         return redirect()->back()->with('message', "Password is incorrectt");
    //        }
    //    } else{
    //         return redirect()->back()->with('message', "Email is incorrect");
    //     }

    // }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }


}

