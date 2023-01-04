@extends('layouts.basic')
@section('title', 'Edit Post - Chronochat')
@section('header', 'Home')


@section('content')
    {{-- <h1>Editing Post </h1>
        <div class="post box">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('posts.update', $post->id) }}">
                @method('PUT')
                @csrf

                <label for="title">Title: </label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                <br>
                <label for="content">Content: </label>
                <input type="text" class="form-control" name="content" value="{{ $post->content }}" />
                <br>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('posts.index') }}">Cancel</a>


        </div> --}}
    <ul>
        <div class="post box">
            <div class="grid grid-rows-1 grid-flow-col gap-0">

                <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @method('PUT')

                    @csrf
                    <h1 class="text-xl">Title<br><input type="text" name="title" value="{{ $post->title }}"></h1>
                    <h1 class="text-xl">Content<br><input type="text" name="content" value="{{ $post->content }}"></h1>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="file" name="image" class="form-control">

                    <input type="submit" value="Submit" class='button'>
                    <button class='button'><a href="{{ route('posts.index') }}" class="btn btn-primary">Cancel</a></button></div>

                </form>

            </div>
        </div>
    </ul>
@endsection
