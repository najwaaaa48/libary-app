<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function register (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'user_id' => $id,
        'user_nama' => $request->input('nama'),
        'user_alamat' => $request->input('alamat'),
        'user_username' => $request->input('username'),
        'user_email' => $request->input('email'),
        'user_notelp' => $request->input('notelp'),
        'user_password' => bcrypt($request->input('password'))
    ];

    $user = User::register($data);

    if ($user) {
        return redirect()->route('register')->with('success', 'Pendaftaran akun berhasil!');
    } else {
        return back()->withInput();
    }
}

public function login (Request $request)
{
    $credentials = [
        'user_username' => $request->input('user_username'),
        'user_password' => $request->input('user_password')
    ];

    $user = User::where('user_username', $credentials['user_username'])->first();

    if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
        Auth::login($user);
        return redirect()->route('dashboard');
    } else {
        return back()->withErrors([
            'message' => 'Username atau password Anda salah.',
        ]);
    }
}

public function register_admin (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'user_id' => $id,
        'user_nama' => $request->input('nama'),
        'user_alamat' => $request->input('alamat'),
        'user_username' => $request->input('username'),
        'user_email' => $request->input('email'),
        'user_notelp' => $request->input('notelp'),
        'user_password' => bcrypt($request->input('password'))
    ];

    $user = User::register($data);

    if ($user) {
        return redirect()->route('register')->with('success', 'Pendaftaran akun berhasil!');
    } else {
        return back()->withInput();
    }
}
public function login_admin (Request $request)
{
    $credentials = [
        'user_username' => $request->input('user_username'),
        'user_password' => $request->input('user_password')
    ];

    $user = User::where('user_username', $credentials['user_username'])->first();

    if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
        Auth::login($user);
        return redirect()->route('admin');
    } else {
        return back()->withErrors([
            'message' => 'Username atau password Anda salah.',
        ]);
    }
}
}
