<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTFactory;
use Illuminate\Support\Facades\Cookie;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


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

    public function loginjwt(Request $request) {
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute wajib diisi sama email ya cuy!!!',
        ];

        $request->validate([
            'email' => 'email',
            'password' => 'required',
        ],$messages);

        $credentials = $request->only('email', 'password');
        if ($token = Auth::attempt($credentials)) {
            $customClaims = [
                'email' => auth()->user()->email
            ];

            // $payload = JWTFactory::make($customClaims);
            // $token = JWTAuth::encode($payload);
            // dd($token);

            // $cookie_token = cookie('smarttoken', $token, time() + 60 * 60 * 24, '/', '.app.test');
            $data = [
                'iat' => strtotime("now"),
                'exp' => strtotime("now") + 72000,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'username' => Auth::user()->username,
                'role' => Auth::user()->role,
                'sub' => 'SSO-SMARTPTIK'
            ];
            $key = env('JWT_SECRET');
            $jwt = JWT::encode(
                $data,
                $key,
                'HS256'
            );
            $request->session()->put('username', Auth::user()->username);
            $cookie_name = "smarttoken";
            $cookie_value = $jwt;
            setcookie($cookie_name, $cookie_value, strtotime("now") + (86400 * 1), "/", ".app.test");

            // $cookie_token = cookie('smarttoken', $token, time() + 60 * 60 * 24, '/', '.app.test');
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
        $cookie = Cookie::forget('smarttoken');
        Auth::logout();

        return redirect('login')->withCookie($cookie);
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
