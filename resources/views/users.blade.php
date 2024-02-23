<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
<div class="container">
    <div class="dashboard">
        @if (Auth::check())
            <div class="username">Welcome, ID: {{ Auth::user()->id }}!</div>
            <div class="username">Welcome, Name: {{ Auth::user()->name }}!</div>
            <div class="username">Welcome, Email: {{ Auth::user()->email }}!</div>

            <form action="{{ route('reg') }}" method="POST">
                @csrf
                <button type="submit" class="button">Logout</button>
            </form>
        @else
            <p>You are not logged in.</p>
            <a href="{{route('reg')}}">Login</a>
        @endif
    </div>
</div>
</body>
</html>
