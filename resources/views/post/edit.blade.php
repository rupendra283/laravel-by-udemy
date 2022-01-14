@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Update
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update',$post->slug) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" class="form-control" type="text" name="title" value="{{ $post->title }}">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control" id="content" cols="10" >{{ $post->title }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
