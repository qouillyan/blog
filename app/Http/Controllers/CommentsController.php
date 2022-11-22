<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;

class CommentsController extends Controller
{
    //public function store($id) 
    public function store(StoreCommentRequest $request, $id) {
        $validated = $request->validated();

        Post::find($id)->addComment($validated['body']);

        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $id
        // ]);

        return redirect()->back();
    }
}
