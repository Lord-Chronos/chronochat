@if (Auth::check())
    @if ($comment->user_id == Auth::id() || Auth::user()->roles->contains('delete_all_posts', 1))
        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
            @csrf
            @method('DELETE')
            <div class="flex flex-row gap-5">
                @if ($post->user_id == Auth::id() || Auth::user()->roles->contains('edit_all_posts', 1))
                    <div> <button class='button'><a
                                href="{{ route('comments.edit', $comment->id) }}"
                                class="btn btn-primary">Edit</a></button></div>
                @endif
                <div><button class='button' type="delete">Delete</button>
                </div>

            </div>
        </form>
    @endif
@endif