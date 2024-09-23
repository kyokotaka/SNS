<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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



require __DIR__ . '/auth.php';//継承的なもの

Route::group(['middleware' => 'auth'],function(){
    
Route::get('/top', [PostsController::class, 'index']);//ログイン後トップに飛ぶためのルーティング

Route::post('/post/create',[PostsController::class,'post_create']);

Route::get('profile', [ProfileController::class, 'profile']);

Route::get('/search', [UsersController::class, 'search']);
Route::post('/search', [UsersController::class, 'search']);

Route::get('/follow-list', [PostsController::class, 'index']);
Route::get('/follower-list', [PostsController::class, 'index']);

Route::post('/follow', [UsersController::class, 'follow']);

Route::get('/logout', [AuthenticatedSessionController::class, 'logout']);//aタグなのでgetでOK
});
