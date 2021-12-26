<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute wajib diisi sama email ya cuy!!!',
        ];

        $request->validate([
            'email' => 'email',
            'password' => 'required',
        ],$messages);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == "Admin") {
                return redirect()->intended('/admin');
            } else if (Auth::user()->role == "Dosen") {
                return redirect()->intended('/dashboard-dosen');
            } else if (Auth::user()->role == "Kaprodi") {
                return redirect()->intended('/kaprodi');
            } else {
                return redirect()->intended('/');
            }
        }
        return redirect("login");
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    // public function store()
    // {
    //     $this->validate(request(), [
    //         'nama' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'role' => 'required'
    //     ]);

    //     $user = User::create(request(['nama', 'email', 'password','role']));

    //     auth()->login($user);

    //     return redirect()->to('/login');
    // }
}
