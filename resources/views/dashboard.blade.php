<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: inline-block;
            justify-content: left;
            align-items: center;
            height: 100vh;
        }

        .dashboard {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .username {
            margin-bottom: 20px;
        }

        .button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
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
            <a href="">Login</a>
        @endif
    </div>


    <div class="div">
        <h1>Events</h1>
        <ul>
            @foreach($events as $event)
                <a href="
                {{ route('events.show', $event->id) }}">{{ $event->title }}>{{$event->slug}}
                </a>
                <br>
                <br>
            @endforeach
        </ul>
    </div>
    <div class="div">
        <h1>Tickets</h1>
        <ul>
            @foreach($tickets as $ticket)
                <a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->name }}>{{$ticket->cost}}
                <br>
                <br>
            @endforeach
        </ul>
    </div>

</div>
</body>

</html>