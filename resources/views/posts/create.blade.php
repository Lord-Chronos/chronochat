@extends('layouts.basic')

@section('title', 'Create Post')

@section('content')
    <h1>Form for Posts:</h1>

    <form method="post" action="{{ route('posts.store')}}">
        @csrf
        <p>Title <input type="text" name="title" value={{ old('title') }}></p>
        <p>Content <input type="text" name="content" value={{ old('content') }}></p>
        <input type="submit" value="Submit">
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>

@endsection