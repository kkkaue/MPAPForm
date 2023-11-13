<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //RegisterController.php

    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Verificação se o e-mail já está cadastrado
        $userExists = \App\Models\User::where('email', $request->email)->count();
        if ($userExists > 0) {
            return redirect()->route('register')
                ->withErrors(['email' => 'E-mail já cadastrado!'])
                ->withInput();
        }

        // Criação do usuário
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password)
            'password' => $request->password
        ]);

        // Autenticação do usuário
        auth()->login($user);

        // Redirecionamento
        return redirect()->route('dashboard');
    }
}
