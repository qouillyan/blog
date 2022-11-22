@extends('layouts.master')

@section('title', $post->title)

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

        <p>{{ $post->body }}</p>
    </div><!-- /.blog-post -->

    <div>
        <h4>Comments</h4>

        <ul>
            {{-- SELECT * FROM comments WHERE post_id = 1 --}}
            @foreach ($post->comments as $comment)
                <li>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>

@endsection