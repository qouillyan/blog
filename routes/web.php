<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('single-post');
Route::post('/posts/{id}/comments', [CommentsController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'destroy']);