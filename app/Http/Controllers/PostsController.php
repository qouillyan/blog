<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

// index - list users - GET /users 
// show - single user - GET /users/:id
// create - create user form - GET /users/create*
// store - create user in db - POST /users
// edit - edit user form - GET /users/edit*/:id
// update - update user in db - PUT /users/:id
// destroy - delete user from db - DELETE /users/:id

class PostsController extends Controller
{
    public function index() {
        $posts = Post::published();

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
}
