@extends('layouts.basic')
@section('title', $user->name)
@section('content')
    <h1>Information for {{ $user->name }}:</h1>

    <ul>
        <div class="post box">

            <p><b>Name: </b>{{ $user->name }} </p>
            <p><b>ID: </b>{{ $user->id }}</p>
            <p><b>Email: </b>{{ $user->email }}</p>
        </div>

        <br>
        <b> POSTS </b>

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
                <p>{{ $post->content }} </p>

            </div>
            @if ($post->user_id == Auth::id())
                <p> Yours {{ $post->user->name }}</p>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    </form>
            @endif
            <br>
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
    </div>

@endsection
