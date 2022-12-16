@extends('layouts.basic')
@section('title', 'Edit Post')

@section('content') <div class="row">
            <h1>Editing Post </h1>

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

                <label for="title">Post Name: </label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                <br>
                <label for="content">Stock Ticket: </label>
                <input type="text" class="form-control" name="content" value="{{ $post->content }}" />
                <br>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('posts.index') }}">Cancel</a>


    </div>
@endsection
