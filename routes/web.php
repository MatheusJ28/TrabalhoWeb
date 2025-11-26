<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

//Se usuario nao logado
Route::middleware([CheckIsNotLogged::class])->group(
    function () {
        Route::GET('/login', [AuthController::class, 'login'])->name('login');
        Route::POST('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
        Route::GET('/register', [AuthController::class, 'create'])->name('register');
    }
);


//Se usuario logado
Route::middleware([CheckIsLogged::class])->group(
    function () {
        Route::GET('/', [MainController::class, 'index'])->name('home');
        Route::GET('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::GET('/search', [MainController::class, 'index'])->name('search');
        Route::get('/obra/{slug}', [MainController::class, 'show'])->name('obra.show');
        Route::delete('/obra/{slug}', [MainController::class, 'destroy'])->name('obra.destroy');
        Route::get('/criar', [MainController::class, 'create'])->name('obra.create');
        Route::post('/obra', [MainController::class, 'store'])->name('obra.store');
        Route::get('/capitulo/{slug}/{numero}', [MainController::class, 'capitulo'])->name('capitulo');
        Route::get('/obra/{slug}/editar', [MainController::class, 'edit'])->name('obra.edit');
        Route::put('/obra/{slug}', [MainController::class, 'update'])->name('obra.update');
        Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    }
);
