@extends('layouts.app')

@section('content')

<div class="container-fluid py-4 shadow">
    <div class="row">
        <div class="col-6 col-sm-4 col-md-2">
            <img src="{{ route('getImage', ['img_src' => $user->posts[0]->img_src]) }}" class="img-thumbnail rounded-circle" alt="User Avatar">
        </div>
        <div class="col-6 col-sm-8 col-md-10">
            <h3>{{ $user->name }}</h3>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-6 col-sm-4 col-md-3 my-2">
            <a href="{{ url('/posts/' . $post->id) }}">
                <img src="{{ route('getImage', ['img_src' => $post->img_src]) }}" class="img-thumbnail" alt="Post Image">
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection