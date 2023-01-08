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
            @include('posts.commentsform')
            <br>
        @endforeach
        {{-- <livewire:counter /> --}}
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <input type="text" name="content" placeholder="Comment" value={{ old('content') }}>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="submit" value="Comment" style='display:inline' class='button'>
        </form>
    </ol>
    <br>
</div>
<br>

@endsection
