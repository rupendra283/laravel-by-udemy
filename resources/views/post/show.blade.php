@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                   Blog details
                    <a href="{{ route('post.index') }}" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                            <img class="d-block img-fluid" src="{{ Storage::url($post->image)}}" alt="First slide">
                        <h3>{{ $post->user->name }} <span class="badge bg-success">{{ $post->title }}</span> <span class="badge bg-primary">{{ count($post->comments) }}</span> </h3>
                        <p>{{ $post->content }}.</p>
                        <hr>
                        @if (count($post->comments) > 0)
                        @foreach ($post->comments as $comment)
                        <div class="d-flex flex-start align-items-center">
                          <img
                            class="rounded-circle shadow-1-strong me-3"
                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                            alt="avatar"
                            width="60"
                            height="60"
                          />
                          <div>
                            <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
                            <p class="text-muted small mb-0">
                              Shared publicly - {{$comment->created_at->diffForHumans()}}
                            </p>
                          </div>
                        </div>
                        @endforeach
                        <p class="mt-3 mb-4 pb-2">
                         {{ $comment->comment }}.
                        </p>

                        @else
                        No Comment found

                        @endif

                      </div>
                      <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                          <img
                            class="rounded-circle shadow-1-strong me-3"
                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                            alt="avatar"
                            width="40"
                            height="40"
                          />
                          <div class="form-outline w-100">
                              <form action="{{ route('comment.store') }}" method="post">
                                @csrf
                            <textarea
                              class="form-control" name="comment"
                              id="textAreaExample"
                              rows="4"
                              style="background: #fff;"
                            ></textarea>
                            @error('comment')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
                        </div>
                        <div class="float-end mt-2 pt-1">
                          <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                        <a href="{{ route('post.index') }}" class="btn btn-secondary btn-sm">back</a>
                        </div>
                     </form>
                  </div>
                    </div>
                    </div>
                    </div>

            </div>
        </div>
@endsection
