@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8">
            <div class="list-unstyled bg-white">
                @foreach($users as $user)
                <a href="{{ url('/users/' . $user->id) }}" class="media my-4 p-3 border">
                    <img class="mr-3 img rounded-circle" src="{{ route('getImage', ['img_src' => $user->posts[0]->img_src]) }}" alt="Profile image" width="50">
                    <div class="media-body">
                    <h5 class="my-3">{{ $user->name }}</h5>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection