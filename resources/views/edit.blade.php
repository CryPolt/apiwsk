<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
<form action="{{ route('events.update', $event->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ $event->title }}"><br>
    <label for="slug">Slug</label>
    <input type="text" name="slug" value="{{$event->slug}}"><br>
    <label for="body">Body</label>
    <textarea id="body" name="body">{{ $event->body }}</textarea><br>
    <input type="submit" value="Save">
</form>
</body>
</html>
