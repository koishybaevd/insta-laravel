<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Exception;

/*
//IMG SRC
{{ route('name') }}

//GET
$img = Image::make(storage_path('app/myImage.jpg'));
return $img->response('jpg');

//PUT
Storage::put('myImage.jpg', $img);

*/
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'text' => 'required|min:1|max:255',
            'image' => 'required|image'
        ]);

        $user_id = Auth::id();

        try {
            $img_name = $user_id . '_' . time() . '.jpg';
            $img = Image::make(Input::file('image'))->encode('jpg')->save($img_name);
            $img = $img->fit(800)->save();
            Storage::disk('local')->put('/images' . '/' . $img_name, $img);
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
        
        Post::create([
            'text' => $request->input('text'),
            'img_src' => $img_name,
            'user_id' => $user_id
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'text' => 'required|min:1|max:255',
            'image' => 'required|image'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
