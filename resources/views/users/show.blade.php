@extends('layouts.basic')
@section('title', $user->name)
@section('content')
    <h1>Information for {{ $user->name }}:</h1>

    <ul>
        {{-- <div> <img class="h-22 w-22 ..." src="{{ asset("images/users/$user->image") }}" /></div> --}}
        {{-- <div class="flex v-screen ">
            <div class=" m-auto relative w-24 h-24"><img class="rounded-full border border-gray-100 shadow-sm"
                    src="{{ asset("images/users/$user->image") }}" alt="user image" /></div>
        </div>
        <br> --}}
        <div class="flex flex-row justify-start ">
            <div class="m-auto flex flex-row ">
                <div class="post box">
                    <div>
                        <p><b>Name: </b>{{ $user->name }} </p>
                        <p><b>ID: </b>{{ $user->id }}</p>
                        <p><b>Email: </b>{{ $user->email }}</p>
                    </div>
                    <div></div>
                    <div>
                        <img class=" m-auto inline-block align-middle object-fill h-96 w-96  rounded-full border border-gray-100 shadow-sm"
                            src="{{ asset("images/users/$user->image") }}" alt="user image" />
                    </div>
                    <div class="row">

                        @if ($user->id == Auth::id())

                            <form action="{{ route('image-upload.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control">
                                    @if ($errors->has('image'))
                                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class='button'>Upload Profile Pic</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <br>
        <b> POSTS </b>

        @foreach ($posts as $post)

            <div class="post box">
            @include('posts.info')

                {{-- <span class="post-header">
                    <p>
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
                @endif --}}
            </div>
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
