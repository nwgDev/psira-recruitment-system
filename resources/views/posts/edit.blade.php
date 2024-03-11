@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="mb-4">Edit Job Post</h2>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Post Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $post->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_description">Job Description:</label>
                        <textarea name="job_description" id="job_description" class="form-control" required>{{ $post->job_description }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_unit">Business Unit:</label>
                        <select name="business_unit" id="business_unit" class="form-control" required>
                            <option value="">Select Business Unit</option>
                            @foreach($businessUnitOptions as $option)
                                <option value="{{ $option }}" {{ $post->business_unit == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="manager_name">Manager Name:</label>
                        <input type="text" name="manager_name" id="manager_name" class="form-control" value="{{ $post->manager_name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="manager_email">Manager Email:</label>
                        <input type="email" name="manager_email" id="manager_email" class="form-control" value="{{ $post->manager_email }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="required_experience_in_years">Number of years required::</label>
                        <input type="number" name="required_experience_in_years" id="required_experience_in_years" class="form-control" value="{{ $post->required_experience_in_years }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qualification_id">Qualification:</label>
                        <select name="qualification_id" id="qualification_id" class="form-control" required>
                            <option value="">Select Qualification</option>
                            @foreach($qualifications as $qualification)
                                <option value="{{ $qualification->id }}" {{ $post->qualification_id == $qualification->id ? 'selected' : '' }}>{{ $qualification->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="drivers_license">Driver's License:</label>
                        <select name="drivers_license" id="drivers_license" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($driversLicenseOptions as $option => $key)
                                <option value="{{ $key }}" {{ $post->drivers_license == $key ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="opening_date">Opening Date:</label>
                        <input type="date" name="opening_date" id="opening_date" class="form-control" value="{{ $post->opening_date }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="closing_date">Closing Date:</label>
                        <input type="date" name="closing_date" id="closing_date" class="form-control" value="{{ $post->closing_date }}" required>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <button type="submit" class="btn1">Update</button>
                </div>

                <div class="col-md-6 action-buttons ">
                    <div class="form-group row justify-content-between">
                        <a href="{{ route('admin.posts.index') }}" class=" btn1">Cancel</a>
                        <button type="button" class="btn1" >Exit</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
