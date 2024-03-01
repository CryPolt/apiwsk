<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->title }}</title>
</head>
<body>
<li>{{ $event->id }}</li>
<h1>Title {{ $event->title }}</h1>
<p>Body {{ $event->body }}</p>
<p>Created at: {{ $event->date }}</p>
<li>{{ $event->author->name }}</li> <!-- Assuming you have a 'name' column in your 'users' table -->

    <form action="{{ route('events.edit', ['id' => $event->id]) }}" method="get">
        @csrf
        <button type="submit">Изменить тикет</button>
    </form>

    <form action="{{ route('events.delete', ['id' => $event->id]) }}" method="post">
        @csrf
        <button type="submit">Delete events</button>
    </form>

</body>
</html>
