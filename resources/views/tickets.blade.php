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

<h1>Create Ticket</h1>
<div class="">
    <form action="{{ route('tickets.create', ['id' => $ticket->id]) }}" method="get">
        @csrf
        <button type="submit">Создать ticket</button>
    </form>
</div>
</body>
</html>
