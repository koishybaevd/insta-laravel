<?php

namespace InstaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use InstaLaravel\User;
use InstaLaravel\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {       
        $users = User::where('name', 'LIKE', '%' . $request->input('query') . '%')->get();
        return view('search', compact('users'));
    }
}
