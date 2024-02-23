<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->title }}</title>
</head>
<body>
<h1>Title {{ $event->title }}</h1>
<p>Body {{ $event->body }}</p>
<p>Created at: {{ $event->created_at }}</p>
</body>
</html>
