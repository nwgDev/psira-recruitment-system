<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $provinces = Province::all();

        return view('users.register', compact('provinces'));
    }

    public function store(CreateUserRequest $request)
    {
        if ($request->hasFile('cv_link') && $request->file('cv_link')->isValid()) {
            $originalFileName = $request->file('cv_link')->getClientOriginalName();

            $cvFileName = time() . '_' . str_replace(' ', '_', $originalFileName);

            $storedFilePath = $request->file('cv_link')->storeAs('public/cv', $cvFileName);
        }

        User::create([
            'username'      => $request->input('username'),
            'id_number'     => $request->input('id_number'),
            'password'      => Hash::make($request->input('password')),
            'name'          => $request->input('name'),
            'surname'       => $request->input('surname'),
            'cell_number'   => $request->input('cell_number'),
            'work_number'   => $request->input('work_number'),
            'email'         => $request->input('email'),
            'home_address'  => $request->input('home_address'),
            'province_id'   => $request->input('province_id'),
            'code'          => $request->input('code'),
            'cv_link'       => $storedFilePath,
        ]);

        return redirect()->route('welcome')->with('success', 'Your information was captured successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $user               = Auth::user();
            session(['user_id'  => $user->id]);

            if ($request->input('post_id') != null) {
                return redirect()->route('applicant.apply', ['post_id' => $request->post_id]);
            }

            return redirect()->route('welcome',  ['user' => $user]);
        }

        return back()->withErrors(['error' => 'Invalid credentials!']);
    }

    public function showNotification($id)
    {
        $user = Auth::user();

        $notification = $user->notifications()->findOrFail($id);

        return view('emails.application_received', ['notification' => $notification]);
    }
}
