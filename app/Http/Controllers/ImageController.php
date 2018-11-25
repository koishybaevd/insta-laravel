<?php

namespace InstaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    /**
     * Return image src.
     */
    public function getImage($img_src)
    {
        $img = Image::make(storage_path('app/local/images/' . $img_src));
        return $img->response('jpg');
        // for public
        //$url = Storage::url($img_src);
        //return "<img class='card-img-top' src=" . $url . " alt='Post image'>";
    }
}
