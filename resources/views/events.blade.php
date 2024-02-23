<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events</title>
</head>
<body>
<h1>Events</h1>
<ul>
    @foreach($events as $event)
        <li>{{ $event->title }}</li>
    @endforeach
</ul>
</body>
</html>
