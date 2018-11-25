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
                    <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="inputText">Post Text</label>
                            <textarea name="text" class="form-control" id="inputText" rows="3">{{ $post->text }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputFile">Post Image</label>
                            <input name="image" type="file" class="form-control-file" id="inputFile">
                        </div>
                        @if(!empty($errors->first()))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
