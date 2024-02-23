<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
</head>
<body>
<form action="{{ route('tickets.update', $ticket->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <input type="text" id="name" name="name" value="{{ $ticket->name }}"><br>
    <label for="slug">Cost</label>
    <input type="text" name="cost" value="{{$ticket->cost}}"><br>
    <label for="body">Body</label>
    <textarea id="body" name="body">{{ $ticket->body }}</textarea><br>
    <input type="submit" value="Save">
</form>
</body>
</html>
