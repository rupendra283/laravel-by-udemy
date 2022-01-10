@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" class="form-control" type="text" name="title">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control" id="content" cols="10" ></textarea>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input id="image" class="form-control" type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
