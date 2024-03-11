<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
<div class="header">
    <div>
        <img src="{{ asset('images/logo.png') }}" alt="Your Logo" class="logo">
    </div>

    <div class="right-div">
        <div class="registration">
            <a href="{{ route('applicant.register') }}">New Registration</a>
        </div>
        <div class="welcome-text">
            <h2>Welcome to Psira e-Recruitment</h2>
        </div>
    </div>
</div>
<div class="message">
    <p>To apply for a position, please click on "Click here to apply" next to the <br> position you wish to apply for.</p>
</div>

<div class="table-details">
    <table>
        <thead>
        <tr>
            <th>Post Name</th>
            <th>Job Requirement</th>
            <th>Closing Date</th>
            <th>APPLY</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->job_description }}</td>
                <td>{{ $post->closing_date }}</td>
                <td>
                    @if(Auth::check())
                        <a href="{{ route('applicant.apply', ['post_id' => $post->id]) }}" class="apply-link">Click here to apply</a>
                    @else
                        <a href="{{ route('applicant.login', ['post_id' => $post->id]) }}" class="apply-link">Click here to apply</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
