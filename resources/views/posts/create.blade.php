@extends('layouts.basic')

@section('title', 'Create Post - Chronochat')

@section('content')
    <h1>Form for Posts:</h1>
    <div class="post box">

        <div class="grid grid-rows-1 grid-flow-col gap-0">

            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <h1 class="text-xl">Title<br><input type="text" name="title" placeholder="Title" value={{ old('title') }}>
                </h1>
                <h1 class="text-xl">Content<br><input type="text" name="content" placeholder="Content"
                        value={{ old('content') }}></h1>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="file" name="image" class="form-control">

                <input type="submit" value="Submit" class='button'>


            </form>

        </div>
    </div>
                <a href="{{ route('posts.index') }}" class='button'>Cancel</a>

@endsection
