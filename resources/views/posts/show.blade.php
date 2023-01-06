@extends('layouts.basic')
@section('title', $post->title)
@section('content')
@section('header', $post->id)

<h1>Information for post {{ $post->id }}:</h1>
<br>
<div class="post box">
    @include('posts.info')

    @include('posts.postsform')

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
            @include('posts.commentsform')
        @endforeach
        {{-- <livewire:counter /> --}}
    </ol>
    <br>
</div>
<br>

@endsection
