<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if(isset($request->busca)){
            $dados = Formulario::with(['anexos', 'cargo'])->where('cargo_id', $request->busca)->get();
            return view('dashboard')->with(['dados' => $dados]);
        } else {
            $dados = Formulario::with(['anexos', 'cargo'])->get();
        }
        return view('dashboard')->with(['dados' => $dados]);
    }
}
