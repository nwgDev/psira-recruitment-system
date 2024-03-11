<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Post</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.styles.css">
</head>
<body>
<div class="header">
    <div>
        <img src="/images/logo.png" alt="Your Logo" class="logo">
    </div>

    <div class="right-div">
        <div class="welcome-text">
            <h2>Welcome to Psira e-Recruitment</h2>
        </div>

        <div class="welcome-text1">
            <p>Complete the information to apply for the desired position</p>
        </div>
    </div>
</div>

<div class="container mt-2">
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

<div class="welcome-message1">
    <h3 class="welcome-message">{{ $user->name }} {{ $user->surname }},</h3>
    <u class="welcome-message">You are applying for position:</u>
    <h3 class="welcome-message">{{ $post->name }}</h3>
</div>

<form action="{{ route('applicant.store')}}" method="POST">
    @csrf

    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">

    <div class="row just">
        <div class="col-md-6">
            <div class="form-group">
                <label for="qualification_id">Highest Qualification:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="qualification_id" id="qualification_id" class="form-control" required>
                    <option value="">Select Qualification</option>
                    @foreach($qualifications as $qualification)
                        <option value="{{ $qualification->id }}" {{ old('qualification_id') == $qualification->id ? 'selected' : '' }}>{{ $qualification->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="drivers_license">Drivers License:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="drivers_license" id="drivers_license" class="form-control" required>
                    <option value="">Select</option>
                    @foreach($driversLicenseOptions as $option => $key)
                        <option value="{{ $option }}" {{ old('drivers_license') == $key ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="current_position">Current Position:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="current_position" id="current_position" class="form-control" value="{{ old('current_position') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="company_name">Company:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="number_year_employed">Number of years employed<br>with current employer:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="number" name="number_year_employed" id="number_year_employed" class="form-control" value="{{ old('number_year_employed') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="current_annual_salary_ctc">Current Annual Salary - CTC:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="current_annual_salary_ctc" id="current_annual_salary_ctc" class="form-control" value="{{ old('current_annual_salary_ctc') }}" required placeholder="R">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="total_experience_in_years" class="red-label">Total Number of Experience<br>in the field:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="number" name="total_experience_in_years" id="total_experience_in_years" class="form-control" value="{{ old('total_experience_in_years') }}" required>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <hr>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label><b>Previous Positions</b></label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="previous_position">Previous Position:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="previous_position" id="previous_position" class="form-control" value="{{ old('previous_position') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="previous_company">Previous Company:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="previous_company" id="previous_company" class="form-control" value="{{ old('previous_company') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="period_from">Period From:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" name="period_from" id="period_from" class="form-control" value="{{ old('period_from') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="period_to">Period To:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" name="period_to" id="period_to" class="form-control" value="{{ old('period_to') }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <hr>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <h4>Disclaimer:</h4>
                <p>By clicking apply button, I confirm that the information supplied is correct and that any incorrect
                 information may prejudice me and I further agree for PSiRa to use my information to check my background</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <button type="submit" class="btn1">APPLY</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row justify-content-between">
                <button type="button" class="btn1">CANCEL</button>
                <button type="button" class="btn1">EXIT</button>
            </div>
        </div>
    </div>

</form>
</div>
</body>
</html>
