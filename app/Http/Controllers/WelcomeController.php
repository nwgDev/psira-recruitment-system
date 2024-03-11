<?php

namespace App\Http\Controllers;

use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = $posts = Post::paginate(6);
        return view('welcome')->with('posts', $posts);
    }
}
