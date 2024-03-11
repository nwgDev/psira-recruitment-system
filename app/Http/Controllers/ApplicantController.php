<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Models\Applicant;
use App\Models\Post;
use App\Models\Qualification;
use App\Models\User;
use App\Notifications\ApplicationReceived;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function create($postId)
    {
        $driversLicenseOptions  = Post::$driversLicenseOptions;
        $qualifications         = Qualification::all();
        $user                   = User::find(session('user_id'));
        $post                   = Post::find($postId);

        return view('applicants.apply', compact('driversLicenseOptions','qualifications', 'post', 'user'));
    }
    public function index()
    {
        $applicants = Applicant::all();

        return response()->json(['data' => $applicants]);
    }

    public function store(CreateApplicantRequest $request)
    {
        $validatedData = $request->validated();

        $applicant = Applicant::create($validatedData);
        $post      = Post::findOrFail($applicant->post_id);;

        $user = Auth::user();

        $user->notify(new ApplicationReceived($applicant));

        return view('emails.application_received', [
            'notification' => $post->name,
            'notifiable' => $user
        ])->with('success', 'Your application was captured successfully.');
    }

    public function update(UpdateApplicantRequest $request, $id)
    {
        $applicant      = Applicant::findOrFail($id);

        $validatedData  = $request->validated();

        $applicant->update($validatedData);

        return response()->json(['message' => 'Applicant updated successfully', 'data' => $applicant]);
    }

    public function destroy(Applicant $post)
    {
        $post->delete();

        return response()->json(['message' => 'Applicant deleted successfully.']);
    }

}
