@extends('layouts.basic')
@section('title', $user->name)
@section('content')
    <h1>Information for {{ $user->name }}:</h1>

    <ul>
        <div class="flex flex-row justify-start ">
            <div class="m-auto flex flex-row ">
                <div class="post box">
                    <div>
                        <p><b>Name: </b>{{ $user->name }} </p>
                        <p><b>ID: </b>{{ $user->id }}</p>
                        <p><b>Email: </b>{{ $user->email }}</p>
                        <p><b>Roles:</b> 
                            @foreach ($user->roles as $role)

                                    {{ $role->name }}

                            @endforeach
                            
                    </div>
                    <div></div>
                    <div>
                        @if ($user->image != null)
                            <img class=" m-auto inline-block align-middle object-fill h-96 w-96  rounded-full border border-gray-100 shadow-sm"
                                src="{{ asset('images/'.$user->image->url) }}" alt="user image" />
                                @else
                                <img class=" m-auto inline-block align-middle object-fill h-96 w-96  rounded-full border border-gray-100 shadow-sm"
                                src="{{ asset('images/users/non.jpg') }}" alt="user image" />
                        @endif
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
                @include('posts.postsform')
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
                @include('posts.commentsform')
            </div>
            <br>
        @endforeach

    </ul>
    </div>

@endsection
