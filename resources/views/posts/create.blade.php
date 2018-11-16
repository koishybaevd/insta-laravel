@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6">
            <form action="/posts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputText">Post text</label>
                    <textarea name="text" class="form-control" id="inputText" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputFile">Post Image</label>
                    <input name="image" type="file" class="form-control-file" id="inputFile">
                </div>
                <button type="submit" class="btn btn-primary float-right">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection