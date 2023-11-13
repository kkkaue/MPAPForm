<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //LoginController.php
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Autenticação do usuário
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            // Autenticação válida
            return redirect()->route('dashboard');
        } else {
            // Autenticação inválida
            return redirect()->route('login')->with(['error' => 'E-mail e/ou senha incorretos!']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
