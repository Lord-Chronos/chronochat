@extends('layouts.basic')
@section('title', $user->name)
@section('content')
    <h1>Information for {{ $user->name }}:</h1>

    <ul>
        <div> <img class="h-22 w-22 ..." src="{{ asset("images/users/$user->image") }}" /></div>
        <div class="post box">

            <div class="flex justify-between ">
                <div>
                    <p><b>Name: </b>{{ $user->name }} </p>
                    <p><b>ID: </b>{{ $user->id }}</p>
                    <p><b>Email: </b>{{ $user->email }}</p>
                </div>
                <div></div>


            </div>
            @if ($user->id == Auth::id())

                <form action="{{ route('image-upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class='button'>Upload Profile Pic</button>
                        </div>

                    </div>
                </form>
            @endif
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
            <div class="post boxcomment">
                <li>
                    {{ $comment->content }}

                </li>
                <div class="post-header">
                    <li> on <a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a><b>
                    </li>
                </div>

            </div>
            <br>
        @endforeach

    </ul>
    </div>

@endsection
