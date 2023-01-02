@extends('layouts.basic')
@section('title', 'Posts - Chronochat')
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
        <div id="post-list">
            @foreach ($posts as $post)
                <div class="post box">


                    <span class="post-header">
                        <p> Posted by <a href="{{ route('users.show', $post->user_id) }} "><b>{{ $post->user->name }}</b></a>
                            {{ $post->created_at }}
                        </p>
                    </span>

                    <h1 class="post-title">
                        <a href="{{ route('posts.show', $post->id) }}"><b>{{ $post->title }}</b></a>

                    </h1>
                    
                    {{ $post->content }}
                    @if ($post->user_id == Auth::id())
                        <p> Yours {{ $post->user->name }}</p>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    @endif
                    <br>

                    <ol>
                        @foreach ($post->comment as $comment)
                            <li> <a
                                    href="{{ route('users.show', $comment->user->id) }}"><b>{{ $comment->user->name }}</b></a>
                                <b> replied:</b>
                                {{ $comment->content }}


                            </li>
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
                </div>

                <br>
            @endforeach
        </div>
    </ul>
    </ul>
    {{ $posts->links() }}



@endsection
