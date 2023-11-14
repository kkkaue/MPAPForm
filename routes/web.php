<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExportacaoController;
use App\Http\Controllers\FormularioController;
use App\Models\Anexo;
use App\Models\Formulario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FormularioController::class, 'index']);
Route::get('/inscricao', [FormularioController::class, 'create'])->name('form.create');
Route::post('/form/store', [FormularioController::class, 'store'])->name('form.store');
Route::get('/gerar-pdf/{codigo}', [FormularioController::class, 'gerarPDF']);
Route::post('/verificar-cpf', [FormularioController::class, 'verificarCPF']);
/* Route::get('/teste2', [FormularioController::class, 'reenvioEmail']); */
Route::get('/reenvio/valida/{codigo}', [FormularioController::class, 'reenvioEmailValida']);
Route::get('/validar/{codigo}', [FormularioController::class, 'validar']);
Route::get('/pdf', [FormularioController::class, 'pdfTest']);

/* Route::get('inscricao', Formulario::class); */

// Rotas de login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas de registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rota para o dashboard
Route::get('/dashboard', function () {
    $dados = Formulario::with('anexos')->get();
    return view('dashboard')->with(['dados' => $dados]);
})->middleware(['checar_login'])->name('dashboard');

// Rotas para a redefinição de senha
Route::get('/redefinir-senha', [PasswordResetController::class, 'index'])->name('password.reset');
Route::post('/redefinir-senha', [PasswordResetController::class, 'reset']);
Route::get('/redefinir-senha/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/update-senha', [PasswordResetController::class, 'updatePassword'])->name('password.update');

// Rota de teste
Route::get('/teste', function () {

    return view('mail.inscricao');
});
