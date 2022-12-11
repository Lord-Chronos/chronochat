@extends('layouts.basic')
@section('title', ($post->title))
@section('content')
<h1>Information for post {{ $post->id }}:</h1>
<br>
<ul>
    <li> {{$post->title }} <b>Posted by {{$post->user->name}} on {{$post->created_at}}</b></li>
         {{$post->content }}
    <br>

    <ol>
        @foreach ($post->comment as $comment)
            <li> <b>{{$comment->user->name}} replied:</b> {{$comment->content }}</li>
    
        @endforeach
    </ol>
    <br>
    <br>


</ul>

@endsection