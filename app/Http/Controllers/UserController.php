<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"],
        ]);
        $username = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt([$username => $request->input("username"), "password" => $request->input("password")], $request->input("remember"))) return response()->redirectTo("/");
        else return back()->withErrors(["error" => "Username or password is not correct !"])->withInput();
    }
    public function login()
    {
        return view("auth.login");
    }
    public function register()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $request->validate([
            "firstname" => ["required", "max:255"],
            "lastname" => ["required", "max:255"],
            "username" => ["required", "max:255", "unique:users"],
            "email" => ["required", "email", "max:255", "unique:users"],
            "password" => ["required", "confirmed", Password::min(6)],
        ]);
        $user = User::create(request(["firstname", "lastname", "username", "email", "password"]));
        auth()->login($user, $request->input("remember"));
        return redirect()->route('home');
    }
    public function profile()
    {
        return view("auth.profile");
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('home');
    }
    public function index() {
        return response()->json(User::all());
    }
}
