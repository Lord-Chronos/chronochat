@if (Auth::check())
    @if ($post->user_id == Auth::id() || Auth::user()->roles->contains('delete_all_posts', 1))
        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <div class="grid grid-rows-1 grid-flow-col gap-0">
                @if ($post->user_id == Auth::id() || Auth::user()->roles->contains('edit_all_posts', 1))
                    <div><button class='button'><a href="{{ route('posts.edit', $post->id) }}"
                                class="btn btn-primary">Edit Post</a></button></div>
                @endif
                <div><button class='button' type="delete">Delete Post</button></div>

            </div>
        </form>
    @endif
    @endif
