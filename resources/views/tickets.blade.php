<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
</head>
<body>


<h1>Tickets </h1>


@foreach($tickets as $ticket)
    <a href="
                {{ route('tickets.show', $ticket->id) }}">{{$ticket->name}}
    </a>
    <br>
    <br>
@endforeach
</body>
</html>
