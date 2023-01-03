@extends('layouts.basic')

@section('title', 'Create Post - Chronochat')

@section('content')
    <h1>Form for Posts:</h1>
            <div class="post box">

    <div style="display: flex;">
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <p>Title<br><input type="text" name="title" value={{ old('title') }}></p>
            <p>Content<br><input type="text" name="content" value={{ old('content') }}></p>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}">Cancel</a>
        </form>
    </div>
    </div>

@endsection