@extends('layouts.app')
@section('title', 'Posts')
@section('content')
<h1>Posts for the site:</h1>
<br>
<ul>
    @foreach ($posts as $post)

    <li> <b>{{$post->title }} Posted by {{$post->user->name}} on {{$post->created_at}}</b></li>
    <li> {{$post->content }} </li>
    <br>

    <ol>
        @foreach ($post->comment as $comment)
            <li> {{$comment->user->name}} replied: {{$comment->content }}</li>
    
        @endforeach
    </ol>
    <br>
    <br>


        
    @endforeach

</ul>

@endsection