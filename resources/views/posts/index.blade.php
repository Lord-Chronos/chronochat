@extends('layouts.basic')
@section('title', 'Posts - Chronochat')
@section('header', 'Home')
@section('content')

    <ul>
        <div class="post box">
            <div class="grid grid-rows-1 grid-flow-col gap-0">

                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-xl">Title<br><input type="text" name="title" placeholder="Title"
                            value={{ old('title') }}></h1>
                    <h1 class="text-xl">Content<br><input type="text" name="content" placeholder="Content"
                            value={{ old('content') }}></h1>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="file" name="image" class="form-control">

                    <input type="submit" value="Submit" class='button'>
                </form>

            </div>
        </div>
        <br>

        @foreach ($posts as $post)
            {{-- @include('layouts.posts') --}}
            <div class="post box">

                @include('posts.info')

                @include('posts.postsform')

                <br>
                <ol>

                    @foreach ($post->comment as $comment)
                        <div class="post boxcomment">
                            <li>
                                <div class="flex flex-col">
                                    <div><a
                                            href="{{ route('users.show', $comment->user->id) }}"><b>{{ $comment->user->name }}</b></a>
                                        <b>:</b>
                                        {{ $comment->content }}
                                    </div>
                                    @include('posts.commentsform')

                                </div>
                            </li>
                        </div>
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
        @endforeach

    </ul>
    </ul>
    <div class="flex justify-between ...">
        <div></div>
        <div class="flex justify-between">{{ $posts->links('pagination::simple-tailwind') }}</div>
        <div></div>
    </div>

    {{-- {{ $posts->links() }} --}}


@endsection
