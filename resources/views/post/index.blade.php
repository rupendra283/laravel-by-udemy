@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    All Blogs
                    <a href="{{ route('post.create') }}" class="btn btn-primary float-end">Add Post</a>
                </div>
                @if (count($posts) >0)

                <div class="card-body">
                    @php
                                $sr =1;
                            @endphp
                    @foreach ($posts as $item)
                    <div class="comment-widgets m-b-20">
                        <div class="d-flex flex-row comment-row">

                            <h5>{{ $sr++ }}</h5>
                            <a href="/post/show/{{ $item->slug }}" {{ Str::limit($item->title, 30, '...')  }}>
                            <div class="p-2"><span class="round"><img src="{{ Storage::url($item->image)}}" alt="user" width="150" height="80"></span></div>
                            <div class="comment-text w-100">
                                <h5>{{ $item->user->name }}</h5>
                            </a>
                                <div class="comment-footer"> <span class="date">{{$item->created_at->diffForHumans()}}</span> <span class="badge bg-primary">{{ $item->title }}</span> </div>
                                <p class="m-b-5 m-t-10">{{ $item->content }}</p>
                                <p class="m-b-5 m-t-10">{{ $item->comments_count }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                @else
                  <h5>No Posts Available !</h5>
                @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
