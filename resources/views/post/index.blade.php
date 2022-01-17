@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-6">
                @forelse ($posts as $post)
                <p>
                    <h3>
                        <a href="{{ route('post.show',$post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p>
                        Added {{ $post->created_at->diffForHumans() }}
                        <b>by {{ $post->user->name }} </b>
                    </p>
                    @if($post->comments_count)
                        <p>{{ $post->comments_count }} comments</p>
                    @else
                        <p>No comments yet!</p>
                    @endif

        @can('post.update',$post)
        <a href="{{ route('post.edit',$post->slug) }}"
    class="btn btn-primary">
    Edit
</a>
@endcan
@can('post.delete',$post)

<a href="{{ route('post.delete',$post->slug) }}" class="btn btn-danger">Delete</a>
</p>
@endcan
@empty
                <p>No blog posts yet!</p>
                @endforelse

            </div>
            <div class="col-sm-4">
                <div class="card">
                    {{-- <div class="card-header">
                        Header
                    </div> --}}
                    <div class="card-body">
                        <h5 class="card-title">Most Commented</h5>
                        <p class="card-text">What People are Currently talking about</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($mostCommented as $item)
                        <li class="list-group-item"> <a href="{{ route('post.show',$item->slug) }}">{{ $item->title }}</a><span class=" badge bg-primary">{{ $item->comments_count }}</span></li>
                        @endforeach
                    </ul>
                    {{-- <div class="card-footer">
                        Footer
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
