@extends('layouts.basic')
@section('title', $post->title)
@section('content')
    <h1>Information for post {{ $post->id }}:</h1>
    <br>
    <ul>
        <li> <a href="{{ route('posts.show', $post->id) }}"><b>{{ $post->title }}</b></a>
            Posted by
            <a href="{{ route('users.show', $post->user_id) }}"><b>{{ $post->user->name }}</b></a>
            on {{ $post->created_at }}
                        <br>

            {{ $post->content }}
            <ol>
                @foreach ($post->comment as $comment)
                    <li> <b>{{ $comment->user->name }} replied:</b> {{ $comment->content }}</li>
                @endforeach
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="text" name="content" value={{ old('content') }}>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="submit" value="Submit">
                </form>
            </ol>
            <br>
            <br>


    </ul>

@endsection
