<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Qualification;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select([
            'id',
            'name',
            'manager_name',
            'business_unit',
            'opening_date',
            'closing_date'
        ])->get();

        return view('posts.index', compact('posts'));
    }

    public function getPosts()
    {
        $posts = Post::all();

        return view('welcome')->with('posts', $posts);
    }

    public function create()
    {
        $businessUnitOptions    = Post::$businessUnitOptions;
        $driversLicenseOptions  = Post::$driversLicenseOptions;
        $qualifications         = Qualification::all();

        return view('posts.create', compact('businessUnitOptions', 'driversLicenseOptions','qualifications'));
    }

    public function store(CreatePostRequest $request)
    {
        $validatedData = $request->validated();

        Post::create($validatedData);

        return redirect()->route('admin.posts.create')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $businessUnitOptions    = Post::$businessUnitOptions;
        $driversLicenseOptions  = Post::$driversLicenseOptions;
        $qualifications         = Qualification::all();

        return view('posts.edit', compact('post', 'businessUnitOptions', 'qualifications', 'driversLicenseOptions'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->validated());

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }


}
