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
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        // $post = new Post();

        // $post->title = request('title');
        // $post->body = request('body');

        // $post->save();

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/posts');
    }
}
