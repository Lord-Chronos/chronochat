@extends('layouts.basic')
@section('title', 'Edit comment - Chronochat')

@section('content') <div class="row">
        <h1>Editing comment </h1>
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
        <form method="post" action="{{ route('comments.update', $comment->id) }}">
            @method('PUT')
            @csrf
            <label for="content">Comment: </label>
            <input type="text" class="form-control" name="content" value="{{ $comment->content }}" />
            <br>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('comments.index') }}">Cancel</a>


    </div>
            </div>

@endsection
