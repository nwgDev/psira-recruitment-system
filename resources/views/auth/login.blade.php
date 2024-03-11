<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="container">
        <div class="left-div">
            <div class="logo">
                <img src="/images/logo.png" alt="Logo">
            </div>
        </div>

        <div class="right-div">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="header">e-Recruitment Admin Portal</div>

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf

                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="btn-login">Login</button>
                <button type="button" class="btn-forgot-password">Forgot password</button>
            </form>
        </div>
    </div>
</body>
</html>
