<style>

    body{

        font-family: Arial, Helvetica, sans-serif;
    }
</style>


<p>
    Hi {{ $comment->user->name }}
</p>

<p>
    Someone Has Commented on your blog post
    <a href="{{ route('post.show',$comment->post->title) }}">
    {{ $comment->post->title }}
    </a>
</p>

<hr>

<p>
    {{-- <img src="{{ $message->embed(public_path() . 'image.png') }}" alt="" /> --}}

    {{ $comment->user->name }}
</p>
