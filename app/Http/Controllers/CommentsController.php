<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store($id) {
        $this->validate(
            request(),
            [ 'body' => 'required|min:3' ]
        );

        Post::find($id)->addComment();

        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $id
        // ]);

        return redirect()->back();
    }
}
