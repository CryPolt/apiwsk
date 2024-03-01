<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events</title>
</head>
<body>
<h1>Events</h1>c
<ul>
    @foreach($events as $event)
        <li>{{$event->id}}</li><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
        <br>
        <br>
    @endforeach
</ul>
<h1>Create Event</h1>
<div class="">
        <form action="{{ route('events.create', ['id' => $event->id]) }}" method="get">
            @csrf
            <button type="submit">Создать Ивент</button>
        </form>
</div>
</body>
</html>
