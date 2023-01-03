@extends('layouts.basic')
@section('title', 'Posts - Chronochat')
@section('header', 'Home')
@section('content')
    {{-- <header>
    <h1>Posts for the site:</h1>
</header> --}}

    <ul>
        <a href="{{ route('posts.create') }}">Create Post on Seperate Page</a>

        <div class="post box">

            <form method="post" action="{{ route('posts.store') }}">
                @csrf
                <p>Title<br><input type="text" name="title" value={{ old('title') }}></p>
                <p>Content<br><input type="text" name="content" value={{ old('content') }}></p>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="submit" value="Submit">
            </form>
        </div>
        <br>
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
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="delete">Delete</button>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    </form>
                @endif
                <br>

                <ol>
                    <h2>Comments</h2>
                    @foreach ($post->comment as $comment)
                        <li> <a href="{{ route('users.show', $comment->user->id) }}"><b>{{ $comment->user->name }}</b></a>
                            <b> replied:</b>
                            {{ $comment->content }}
                        </li>
                    @endforeach
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="text" name="content" value={{ old('content') }}>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="submit" value="Submit" style='display:inline'>
                    </form>

                </ol>

                <br>
            </div>

            <br>
        @endforeach

    </ul>
    </ul>
    <div class="post box">
        {{ $posts->links() }}
    </div>

@endsection
