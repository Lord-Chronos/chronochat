@extends('layouts.basic')
@section('title', $post->title)
@section('content')
@section('header', $post->id)

<h1>Information for post {{ $post->id }}:</h1>
<br>
<div class="post box">

    <span class="post-header">
        <p> Posted by <a href="{{ route('users.show', $post->user_id) }} "><b>{{ $post->user->name }}</b></a>
            {{ $post->created_at }}
        </p>
    </span>

    <h1 class="post-title ">
        <a href="{{ route('posts.show', $post->id) }}"><b class="text-2xl text-rose-800">{{ $post->title }}</b></a>
    </h1>
    <p class="text-xl text-rose-800"> {{ $post->content }} </p>
    @if ($post->user_id == Auth::id())
        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <div class="grid grid-rows-1 grid-flow-col gap-0">
                <div><button class='button'><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit
                            Post</a></button></div>
                <div><button class='button' type="delete">Delete Post</button></div>

            </div>
        </form>
    @endif
    <br>
    <ol>

        {{-- <h2>Comments</h2> --}}
        @foreach ($post->comment as $comment)
            <div class="post boxcomment">
                <li> <a href="{{ route('users.show', $comment->user->id) }}"><b>{{ $comment->user->name }}</b></a>
                    <b>:</b>
                    {{ $comment->content }}
                </li>
            </div>
            <br>
        @endforeach
        {{-- <livewire:counter /> --}}
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <input type="text" name="content" value={{ old('content') }}>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="submit" value="Comment" style='display:inline' class='button'>
        </form>
    </ol>
    <br>
</div>
<br>

@endsection
