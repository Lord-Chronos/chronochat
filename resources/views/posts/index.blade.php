@extends('layouts.basic')
@section('title', 'Posts')
@section('content')
    <h1>Posts for the site:</h1>
    <a href="{{ route('posts.create') }}">Create Post on Seperate Page</a>
    <div style="display: flex;">
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <p>Title<br><input type="text" name="title" value={{ old('title') }}></p>
            <p>Content<br><input type="text" name="content" value={{ old('content') }}></p>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}">Cancel</a>
        </form>
    </div>
    <br>
    <ul>
        @foreach ($posts as $post)
            <li> {{ $post->title }} <b>Posted by {{ $post->user->name }} on {{ $post->created_at }}</b></li>
            {{ $post->content }}
            @if ($post->user_id == Auth::id())
                <p> Yours {{ $post->user->name }}</p>
                <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

            @endif
            <br>

            <ol>
                @foreach ($post->comment as $comment)
                    <li> <b>{{ $comment->user->name }} replied:</b> {{ $comment->content }}</li>
                @endforeach
            </ol>
            <br>
            <br>
        @endforeach

    </ul>

@endsection
