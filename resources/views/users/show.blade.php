@extends('layouts.master')

@section('title', $user->name)

@section('content')
    <h1>{{ $user->name }}</h1>

    <ul>
        @foreach ($user->posts as $post)
            <li>
                <a href="{{ route('single-post', ['id' => $post->id]) }}">{{ $post->title }}</a>       
            </li>
        @endforeach
    </ul>
@endsection