@extends('layouts.basic')
@section('title', 'Posts')
@section('content')
    <h1>Posts for the site:</h1>
    <br>
    <ul>
        @foreach ($posts as $post)

        <li> {{$post->title }} <b>Posted by {{$post->user->name}} on {{$post->created_at}}</b></li>
            {{$post->content }}
        <br>

        <ol>
            @foreach ($post->comment as $comment)
                <li> <b>{{$comment->user->name}} replied:</b> {{$comment->content }}</li>
        
            @endforeach
        </ol>
        <br>
        <br>

        @endforeach

    </ul>
    <a href="{{ route('posts.create')}}">Create Post</a>

@endsection
