<?php

namespace InstaLaravel\Http\Controllers;

use InstaLaravel\Post;
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
        $posts = Post::limit(12)->get();

        return view('posts.index', compact('posts'));
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
     * @param  \InstaLaravel\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \InstaLaravel\Post  $post
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
     * @param  \InstaLaravel\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'text' => 'required|min:1|max:255',
            'image' => 'required|image'
        ]);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \InstaLaravel\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/posts');
    }
}
