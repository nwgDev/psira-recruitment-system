<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.styles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    {{--    <link href="https://cdn.datatables.net/v/dt/dt-2.0.1/datatables.min.css" rel="stylesheet">--}}
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
</head>

<body>
<header class="bg-white text-black px-4 py-2 d-flex justify-content-between align-items-center">
    <div>
        <img src="{{ asset('images/logo.png') }}" height="150" alt="Logo">
    </div>

    <div class="text-center">
        <h1>Welcome to PSiRa e-Recruitment<br> Administrator</h1>
    </div>

    <div class="user-info">
        <div class="logout-link">
            <a href="{{ route('admin.logout') }}" class="text-danger">Logout</a>
        </div>
        <div>
            <span class="label">Username:</span>
            <span>{{ auth()->user()->name }} {{ auth()->user()->surname }}</span>
        </div>
        <div>
            <span class="label">Position:</span>
            <span>{{ auth()->user()->roles[0]->name }}</span>
        </div>
    </div>
</header>

<div class="sidebar bg-light text-black-50">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.posts.index') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.posts.create') }}">Create New Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sifting.cv') }}">Sifting of CV's</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.closed.posts') }}">Closed Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reports') }}">Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.auditing') }}">Auditing</a>
        </li>
    </ul>
</div>

<div class="content">
    @yield('content')
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/dist.query.min.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/v/dt/dt-2.0.1/datatables.min.js"></script>--}}
</body>
</html>
