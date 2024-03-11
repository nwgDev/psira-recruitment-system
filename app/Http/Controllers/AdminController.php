<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.posts.index');
            }

            return back()->withErrors(['error'=> 'Access denied! You are not authorized to perform this action.']);
        }

        return back()->withErrors(['error' => 'Invalid credentials!']);
    }

    public function siftingCV()
    {
        $posts = Post::where('closing_date', '<', now())->get();

        return view('admin.sifting_cv', compact('posts'));
    }

    public function downloadCV($cvFileName)
    {
        echo "Controller method reached"; exit;
        dd($cvFileName);
        $filePath = 'cvs/' . $cvFileName;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            abort(404);
        }
    }

    public function getPostDetails($postId)
    {
        $post = Post::with('qualification:name')->find($postId);

        $post->loadMissing('qualification');

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $applicants             = $post->applicants()->with(['user.province', 'qualification'])->get();
        $post->applicants_count = $applicants->count();
        $post->applicants       = $applicants;

        return response()->json($post);
    }

    public function viewCV($applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);

        return view('admin.view_cv')->with('cvLink', $applicant->cv_link);
    }

    public function closedPosts()
    {
        $closedPosts = [];
        return view('admin.closed_posts', compact('closedPosts'));
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function auditing()
    {
        return view('admin.auditing');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
