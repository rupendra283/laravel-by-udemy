@component('mail::message')
# Comment was posted on your blog post

hi {{ $comment->user->name }}
Someone Has Commented on your blog post

@component('mail::button', ['url' => route('post.show',$comment->post->title)])
View the Blog Post
@endcomponent

@component('mail::panel')
    {{ $comment->comment }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
