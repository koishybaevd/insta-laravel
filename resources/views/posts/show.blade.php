@extends('layouts.app')

@section('content')

<div class="container mt-3 mb-1">

    <div class="row">
        <div class="col-12 col-sm-6">
            <img class="card-img-top" src="{{ route('getImage', ['img_src' => $post->img_src]) }}" alt="Post image">
        </div>
        <div class="col-12 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <a href="{{ url('/users/' . $post->user->id) }}">{{ $post->user->name }}</a>
                        <div>
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-outline-dark">Edit post</a>
                            <a href="#" class="btn btn-sm btn-outline-dark">Delete post</a>
                        </div>
                    </div>
                    <p class="card-text">{{ $post->text }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
