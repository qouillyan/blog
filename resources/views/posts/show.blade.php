@extends('layouts.master')

@section('title', $post->title)

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

    <p>{{ $post->body }}</p>
</div><!-- /.blog-post -->
@endsection