@extends('layouts.basic')
@section('title', 'Ediy Post')

@section('content') <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Editing Post </h1>

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
    </div>
@endsection
