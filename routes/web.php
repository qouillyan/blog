<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/posts', function () {
    // $posts = Post::all(); // select * from posts;

    // select * from posts where published = 1;
    $posts = Post::published();

    return view('posts', compact('posts'));
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::find($id);

    return view('post', compact('post'));
})->name('single-post');
