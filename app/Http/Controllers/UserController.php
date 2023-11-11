<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postLogin(Request $request) {
        //
    }
    public function login() {
        return view("auth.login");
    }
    public function register() {
        return view("auth.register");
    }
    public function store(Request $request) {
        //
    }
    public function profile() {
        //
    }
    public function logout(Request $request) {
        //
    }
}
