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

        <h2 style="margin-bottom: 50px;">Create New Post</h2>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="row just">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Post Name:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_description">Job Description:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="job_description" id="job_description" class="form-control" required>{{ old('job_description') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_unit">Business Unit:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="business_unit" id="business_unit" class="form-control" required>
                            <option value="">Select Unit</option>
                            @foreach($businessUnitOptions as $option)
                                <option value="{{ $option }}" {{ old('business_unit') == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="manager_name">Manager:</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="manager_name" id="manager_name" class="form-control" value="{{ old('manager_name') }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="email" name="manager_email" id="manager_email" class="form-control" value="{{ old('manager_email') }}" placeholder="Manager Email">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="required_experience_in_years">Number of years required:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="required_experience_in_years" id="required_experience_in_years" class="form-control" value="{{ old('required_experience_in_years') }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qualification_id">Qualifications required:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="qualification_id" id="qualification_id" class="form-control" required>
                            <option value="">Highest Qualification</option>
                            @foreach($qualifications as $qualification)
                                <option value="{{ $qualification->id }}" {{ old('qualification_id') == $qualification->id ? 'selected' : '' }}>{{ $qualification->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="drivers_license">Drivers License Required:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="drivers_license" id="drivers_license" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($driversLicenseOptions as $option => $key)
                                <option value="{{ $key }}" {{ old('drivers_license') == $key ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="opening_date">Opening Date:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" name="opening_date" id="opening_date" class="form-control" value="{{ old('opening_date') }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="closing_date">Closing Date:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" name="closing_date" id="closing_date" class="form-control" value="{{ old('closing_date') }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn1">Publish</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row justify-content-between">
                        <button type="button" class="btn1">Cancel</button>
                        <button type="button" class="btn1">Exit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
