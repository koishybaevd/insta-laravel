@extends('layouts.app')

@section('content')

<div class="container">
    <div class="column">
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputAvatar">Upload an avatar for your account</label>
                    <input type="file" class="form-control-file" id="inputAvatar">
                </div>
                <button type="submit">Check</button>
            </form>
        </div>
        <div class="col-12">
            <div class="thumbnail">
                <img src="http://wallpaper-gallery.net/images/images/images-2.jpg" class="" />
            </div>
        </div>
    </div>
</div>
@endsection