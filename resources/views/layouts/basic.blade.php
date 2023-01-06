<!DOCTYPE html>

<head>
    <title> @yield('title') </title>
</head>

<body>

    <head>
        <title>@yield('title')</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
        @vite(['public/css/app.css', 'resources/js/app.js'])

        @livewireStyles

    </head>
    @if (Auth::check())
        @include('layouts.navigation')
    @endif

    <body>
        @livewireScripts
        {{-- <h1> @yield('header') </h1> --}}
        <main id="page-content">

            <div id="posts-list">


                <div id="filter-list" class="box">
                    @if (Auth::check())
                        <div class="filter">
                            <a class="nav-link" href={{ route('posts.index') }}>Home</a>
                        </div>

                        <div class="filter">
                            <a class="nav-link" href={{ route('users.show', Auth::id()) }}>User</a>
                        </div>

                        <div class="filter">
                            <a class="nav-link" href={{ route('posts.create') }}>
                                <p>Create Post</p>
                            </a>
                        </div>
                    @else
                        <div class="filter">
                            <a class="nav-link" href={{ route('login') }}>
                                <p>Login</p>
                            </a>
                        </div>
                        <div class="filter">
                            <a class="nav-link" href={{ route('register') }}>
                                <p>Register</p>
                            </a>
                        </div>
                    @endif

                </div>
                @if ($errors->any())
                    <div class="text-rose-700">
                        Errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li  >{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('message'))
                    <p><b>{{ session('message') }}</b></p>
                @endif

                @yield('content')
            </div>
        </main>
        {{-- @include('layouts.footer') --}}

    </body>

    </html>
