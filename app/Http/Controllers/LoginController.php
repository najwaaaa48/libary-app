<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login ()
{
   return view('login');
}
public function postLogin (LoginRequest $request)
{
    $validated = $request->validated();

    $username = $validated['username'];
    $password = $validated['password'];

    if ($username && $password) {
        echo "Login berhasil";
    } else {
        return back()->withErrors($validated)->withInput();
    }
}
}
