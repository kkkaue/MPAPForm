<?php

use App\Http\Controllers\FormularioController;
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
Route::post('/verificar-cpf', [FormularioController::class, 'verificarCPF']);
Route::get('/validar/{codigo}', [FormularioController::class, 'validar']);
Route::get('/pdf', [FormularioController::class, 'pdfTest']);

/* Route::get('/teste', function () {
    return view('forms.nao-verificado');
}); */