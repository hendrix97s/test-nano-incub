<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->check())
      return redirect()->route('dashboard.index');
    return view('welcome');
})->name('home');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth']], function(){
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

  Route::resource('/funcionarios', UserController::class)->only(['index', 'edit', 'create', 'store'])->parameters(['funcionario' => 'uuid']);
  Route::post('/funcionarios/{uuid}/update', [UserController::class, 'update'])->name('funcionarios.update');
  Route::post('/funcionarios/{uuid}/destroy', [UserController::class, 'destroy'])->name('funcionarios.destroy');
  Route::get('/funcionarios/{uuid}/extrato', [UserController::class, 'extrato'])->name('funcionarios.extrato');

  Route::get('/movimentacoes', [MovimentacaoController::class, 'index'])->name('movimentacoes.index');
  Route::get('/movimentacao/{uuid}/create', [MovimentacaoController::class, 'create'])->name('movimentacoes.create');
  Route::post('/movimentacao/{uuid}/store', [MovimentacaoController::class, 'store'])->name('movimentacoes.store');
});
