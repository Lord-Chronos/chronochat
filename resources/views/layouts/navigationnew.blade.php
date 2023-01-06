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
