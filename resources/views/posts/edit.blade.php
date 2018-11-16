@extends('layouts.app')

@section('content')

<div class="container">
    <div class="column d-flex justify-content-center">
        <div class="col-12 col-md-8">
            <p>Post Image</p>
            <img src="{{ route('getImage', ['img_src' => $post->img_src]) }}" class="img-thumbnail mb-3" alt="Post image">
            
            <form action="/posts/{{ $post->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="inputText">Post Text</label>
                    <textarea name="text" class="form-control" id="inputText" rows="3">{{ $post->text }}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputFile">Post Image</label>
                    <input name="image" type="file" class="form-control-file" id="inputFile">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection