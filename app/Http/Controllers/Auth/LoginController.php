<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

//

class LoginController extends Controller
{
    //LoginController.php
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usuario_db = User::where('login_intranet', $request->login)->first();

         //dd($usuario_db);die();

        if ($usuario_db == null) {

            return Redirect::back()->withErrors('Usuário não encontrado. Por favor, ative sua conta.');
        } else {

            $senha_comp = crypt($request->senha, $usuario_db->senha_intranet);

            // dd($senha_comp);die();
            $valida  = DB::connection('sol')->table('usuario as u')
                ->leftjoin('niveis as n', 'n.id_usuario', 'u.id')
                ->where('u.login_intranet', $request->login)
                ->where('u.senha_intranet', $senha_comp)
                // ->where('n.sistema','E-Corregedoria')
                ->first();

            if ($valida == null) {

                return Redirect::back()->withErrors('Essas credenciais não correspondem aos nossos registros.');
            } else {

                $request->session()->put('usuario', [

                    'login' =>  $valida->login_intranet,
                    'matricula' =>  $valida->matricula,
                    'nome' =>  $valida->nome,
                    'status' =>  $valida->status,
                    'nivel' =>  $valida->nivel,
                    'nivel_corregedoria' => $valida->nivel,
                ]);

                // $teste = $request->session()->get('usuario.login');
                // dd($senha_comp);die();
                if (session()->get('usuario.matricula') != null) {

                    

                    return redirect('/dashboard');
                } else {

                    Session::flush(); // removes all session data
                    return redirect('/login');
                }
            }
        }
    }

    public function logout()
    {
        Session::flush();

        return redirect('/login')->with('mensagem', 'Sessão finalizada com sucesso.');
    }
}
