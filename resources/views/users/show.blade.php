@extends('layouts.basic')
@section('title', $user->name)
@section('content')
    <h1>Information for {{ $user->name }}:</h1>
    <ul>
        <li><b>Name: </b>{{ $user->name }} </li>
        <li><b>ID: </b>{{ $user->id }}</li>
        <li><b>Email: </b>{{ $user->email }}</li>
        <br>
                <b> POSTS </b>

        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}"><b>{{ $post->title }}</b></a>
                on {{ $post->created_at }}
            </li>
        @endforeach
        <br>
        <b> COMMENTS </b>
        @foreach ($comments as $comment)
            <li>
                {{ $comment->content }}</a>
                <br>
                Posted on
                <a href="{{ route('posts.show', $post->id) }}"><b>{{ $post->title }}</b></a>

                on {{ $post->created_at }}
                <br>

            </li>
        @endforeach

    </ul>

@endsection
