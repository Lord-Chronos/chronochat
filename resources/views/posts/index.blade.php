@extends('layouts.basic')
@section('title', 'Posts - Chronochat')
@section('header', 'Home')
@section('content')
    {{-- <header>
    <h1>Posts for the site:</h1>
</header> --}}

    <ul>
        <div class="post box">
            <div class="grid grid-rows-1 grid-flow-col gap-0">

                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-xl">Title<br><input type="text" name="title" value={{ old('title') }}></h1>
                    <h1 class="text-xl">Content<br><input type="text" name="content" value={{ old('content') }}></h1>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="file" name="image" class="form-control">

                    <input type="submit" value="Submit" class='button'>
                </form>

            </div>
        </div>
        <br>

        @foreach ($posts as $post)
            <div class="post box">

                <span class="post-header">
                    <p> Posted by <a href="{{ route('users.show', $post->user_id) }} "><b>{{ $post->user->name }}</b></a>
                        {{ $post->created_at }}
                    </p>
                </span>

                <h1 class="post-title ">
                    <a href="{{ route('posts.show', $post->id) }}"><b
                            class="text-2xl text-rose-800">{{ $post->title }}</b></a>
                </h1>
                <p class="text-xl text-rose-800"> {{ $post->content }} </p>
                @if ($post->image != null)
                    <div> <img class="h-22 w-22 ..." src="{{ asset("images/posts/$post->image") }}" /></div>
                @endif
                @if ($post->user_id == Auth::id())
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="grid grid-rows-1 grid-flow-col gap-0">
                            <div><button class='button'><a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-primary">Edit Post</a></button></div>
                            <div><button class='button' type="delete">Delete Post</button></div>

                        </div>
                    </form>
                @endif
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

                                    @if ($comment->user_id == Auth::id())
                                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex flex-row gap-5">
                                                <div> <button class='button'><a
                                                            href="{{ route('comments.edit', $comment->id) }}"
                                                            class="btn btn-primary">Edit</a></button></div>
                                                <div><button class='button' type="delete">Delete</button>
                                                </div>

                                            </div>
                                        </form>
                                    @endif

                                </div>
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
