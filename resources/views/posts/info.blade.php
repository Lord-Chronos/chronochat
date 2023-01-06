<span class="post-header">
    <p> Posted by <a href="{{ route('users.show', $post->user_id) }} "><b>{{ $post->user->name }}</b></a>
        {{ $post->created_at }}
    </p>
</span>

<h1 class="post-title ">
    <a href="{{ route('posts.show', $post->id) }}"><b class="text-2xl text-sky-300">{{ $post->title }}</b></a>
</h1>
<p class="text-xl text-sky-300"> {{ $post->content }} </p>
@if ($post->image_id != null)
    <div> <img class="h-22 w-22 ..." src="{{ asset('images/' .$post->image->url) }}" /></div>
@endif
