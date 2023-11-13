<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    //PasswordResetController.php

    public function index()
    {
        return view('auth.passwords.redefinir-senha');
    }

    public function reset(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required|email'
        ]);
        
        // Verificação se o e-mail já está cadastrado
        $userExists = \App\Models\User::where('email', $request->email)->count();
        if ($userExists == 0) {
            return redirect()->route('password.reset')
                ->withErrors(['email' => 'E-mail não cadastrado!'])
                ->withInput();
        }

        // Gerar token
        $token = Str::random(64);

        // Salvar token no banco de dados se já existir um token para o usuário, atualizar o token
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token]
        );

        // Enviar e-mail para o usuário
        $this->enviarEmailResetSenha($request->email, $token);

        // Redirecionar de volta com mensagem de sucesso
        return redirect()->route('password.reset')
            ->with(['success' => 'E-mail de redefinição de senha enviado com sucesso!']);
    }

    public function showResetForm($token){
        // Verificar se o token existe
        $tokenExists = DB::table('password_reset_tokens')->where('token', $token)->count();
        if ($tokenExists == 0) {
            return redirect()->route('password.token-invalido')
                ->withErrors(['error' => 'Token inválido!']);
        }

        // Token válido
        return view('auth.passwords.formario-redefinir-senha', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Verificar se o token existe
        $tokenExists = DB::table('password_reset_tokens')->where('token', $request->token)->count();
        if ($tokenExists == 0) {
            return redirect()->route('password.token-invalido')
                ->withErrors(['error' => 'Token inválido!']);
        }

        // Token válido
        // Verificar se o e-mail e o token correspondem
        $tokenData = DB::table('password_reset_tokens')->where('token', $request->token)->first();
        if ($tokenData->email != $request->email) {
            return redirect()->route('password.token-invalido')
                ->withErrors(['error' => 'Token inválido!']);
        }

        // E-mail e token correspondem
        // Atualizar a senha do usuário
        \App\Models\User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

        // Remover o token do banco de dados
        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        // Redirecionar para a página de login com mensagem de sucesso
        return redirect()->route('login')
            ->with(['success' => 'Senha redefinida com sucesso!']);
    }
    
    public function enviarEmailResetSenha($email, $token)
    {
        $data = [
            'token' => $token
        ];

        Mail::to($email)->send(new PasswordResetEmail($data));
    }
    
}
