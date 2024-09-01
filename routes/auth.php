<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

     Route::get('/login', [AuthenticatedSessionController::class, 'login_form'])->name('re_login');//ログイン画面
     Route::post('/login', [AuthenticatedSessionController::class, 'store']);

     Route::get('/register', [RegisteredUserController::class, 'register_form']);
     Route::post('/user/create', [RegisteredUserController::class, 'user_create']);

     Route::get('/added', [RegisteredUserController::class, 'added'])->name('added');
    // Route::post('added', [RegisteredUserController::class, 'added']);

});
//laravel9ではauth.phpでログインの前のルーティングを行なっている。