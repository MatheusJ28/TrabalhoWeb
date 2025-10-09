<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

//Se usuario nao logado
Route::middleware([CheckIsNotLogged::class])->group(
    function(){
        Route::GET('/login', [AuthController::class, 'login'])->name('login');
        Route::POST('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
        Route::GET('/register', [AuthController::class, 'create'])->name('register');
    });


//Se usuario logado
Route::middleware([CheckIsLogged::class])->group(
    function(){
    Route::GET('/', [MainController::class, 'index'])->name('home');
    Route::GET('/new-note', [MainController::class, 'newNote'])->name('new');
    Route::GET('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/obra1', function () { /* ... */ })->name('obra1');
    Route::get('/obra2', function () { /* ... */ })->name('obra2');
    Route::GET('/obra3', [MainController::class, 'obra3'])->name('obra3');
    Route::GET('/obra4', [MainController::class, 'obra4'])->name('obra4');
    Route::GET('/search', [MainController::class, 'index'])->name('search');
    Route::get('/obra/{titulo}', [MainController::class, 'show'])->name('obra.show');
    Route::delete('/obra/{titulo}', [MainController::class, 'destroy'])->name('obra.destroy');
    Route::get('/criar', [MainController::class, 'create'])->name('obra.create');
    Route::post('/obra', [MainController::class, 'store'])->name('obra.store'); 
    Route::get('/capitulo/{obraSlug}/{numero}', [MainController::class, 'capitulo'])->name('capitulo');



    //capitulos das obras
    Route::GET('/obra1/cap1', [MainController::class, 'obra1_cap1'])->name('obra1_cap1');
    Route::GET('/obra1/cap2', [MainController::class, 'obra1_cap2'])->name('obra1_cap2');

});


