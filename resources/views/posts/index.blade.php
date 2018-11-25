@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container text-white">
    <h1 class="display-4">Welcome to InstaLaravel</h1>
    <p class="lead">Join our community</p>
  </div>
</div>

<div class="container mt-5">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-6 col-sm-4 col-md-3 my-2">
            <a href="{{ url('/posts/' . $post->id) }}">
                <img src="{{ route('getImage', ['img_src' => $post->img_src]) }}" class="img-thumbnail" alt="Post Image">
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection