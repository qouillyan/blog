@extends('layouts.master')

@section('title', $post->title)

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">December 14, 2013 by
            <a href="/users/{{ $post->user_id }}">{{ $post->user->name }}</a>
        </p>

        <p>{{ $post->body }}</p>
    </div><!-- /.blog-post -->

    <div>
        <h4>Leave a comment:</h4>

        <form method="POST" action="/posts/{{ $post->id }}/comments">

            @csrf

            <div class="mb-3">
                <input type="text" name="body" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            @error('body')
                @include('partials.error')
            @enderror

            <button type="submit">Send comment</button>
        </form>
    </div>

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