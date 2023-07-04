<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['loginPage', 'login', 'registerPage', 'register']]);
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost:3000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() == 401) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }

        $data = $response->json();
        $user = $data['user'];
        $token = $data['authorization']['token'];
        $request->session()->put('user', $user);
        dd(Auth::user());

        $request->session()->put('token', $token);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget('token');
        return redirect()->route('login');
    }
}
