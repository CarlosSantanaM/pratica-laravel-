<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
// Rotas de Login
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

// Rotas de Cadastro
Route::get('/register', [UserController::class, 'showregister'])->name('form.register');
Route::post('/register', [UserController::class, 'register'])->name('user.register');

// Home
Route::get('/home', [PostController::class, 'index'])->name('index.home')->middleware('auth');

Route::post('/logout', function (Request $request) {
    Auth::logout(); // Faz o logout do usuário
    $request->session()->invalidate(); // Invalida a sessão
    $request->session()->regenerateToken(); // Regenera o token CSRF
    return redirect('login'); // Redireciona para a página de login
})->name('logout');

Route::resource('posts', PostController::class);
