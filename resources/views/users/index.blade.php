@extends('layouts.basic')
@section('title', 'Users - Chronochat')
@section('content')
    <h1>Information for all users:</h1>
    <ul>
        <div class="post box">

            @foreach ($users as $user)
                <li><a href="{{ route('users.show', $user->id) }}"><b>{{ $user->name }}</b></a>
            @endforeach
        </div>
    </ul>
@endsection
