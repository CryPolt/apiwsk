<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tick</title>
</head>
<body>

    @foreach($tickets as $ticket)

        <p>Name: {{ $ticket->name }}</p>
        <p>Cost: {{ $ticket->cost }}</p>
        <p>Description: {{ $ticket->body }}</p>

    @endforeach


</body>
</html>