<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

<div class="header">
    <div>
        <img src="{{ asset('images/logo.png') }}" alt="Your Logo" class="logo">
    </div>
    <div class="right-div">
        <div class="welcome-text">
            <h2>Welcome to Psira e-Recruitment</h2>
        </div>
    </div>
</div>

<div class="welcome-text1">
    <h4>Please fill in your information and upload your cv</h4>
</div>

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
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username" class="label-color">Username</label>
                    <input type="email" name="username" id="username" class="form-control" value="{{ old('username') }}" placeholder="Email Address" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_number" class="label-color">Id Number</label>
                    <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number') }}" required maxlength="13">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="label-color">Password</label>
                    <input type="password" id="password" name="password" required class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="confirm_password" class="label-color">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required class="form-control">
                    <small id="password_error" style="color: red;"></small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="label-color">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="surname" class="label-color">Surname:</label>
                    <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cell_number" class="label-color">Cell Number</label>
                    <input type="tel" id="cell_number" name="cell_number" required pattern="[0-9]{10}" class="form-control" value="{{ old('cell_number') }}">
                    <small id="cell_number_error" style="color: red;"></small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="work_number" class="label-color">Work Number</label>
                    <input type="tel" id="work_number" name="work_number" pattern="[0-9]{10}" class="form-control" value="{{ old('work_number') }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="home_address" class="label-color">Home Address</label>
                    <textarea name="home_address" id="home_address" rows="4" class="form-control">{{ old('home_address') }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="province_id" class="label-color">Province:</label>
                    <select name="province_id" id="province_id" class="form-control" required>
                        <option value="">Select Province</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="code" class="label-color">Code:</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="cv_link" class="label-color">Upload CV</label>
            <input type="file" id="cv_link" name="cv_link" accept=".pdf, .doc, .docx" class="form-control">
            <small id="cv_error" style="color: red;"></small>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="col-md-6 action-buttons">
                <div class="form-group row justify-content-between">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                    <a href="{{ route('welcome') }}" class="btn btn-danger">Exit</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/register.js') }}"></script>

</body>
</html>
