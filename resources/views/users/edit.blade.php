@extends('layouts.basic')
@section('title', 'Edit User - Chronochat')

@section('content') <div class="row">
        <h1>Editing User </h1>

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
        <form method="post" action="{{ route('users.update', $post->id) }}">
            @method('PUT')
            @csrf

            <label for="title">Post Name: </label>
            <input type="text" class="form-control" name="title" value="{{ $users->title }}" />
            <br>
            <label for="content">Stock Ticket: </label>
            <input type="text" class="form-control" name="content" value="{{ $users->content }}" />
            <br>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}">Cancel</a>


    </div>
@endsection
