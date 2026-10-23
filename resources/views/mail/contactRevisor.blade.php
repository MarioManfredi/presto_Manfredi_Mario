<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>

        <h2>Dati dell'utente</h2>
        <h3>Nome: {{$user->name}}</h3>
        <h3>Email: {{$user->email}}</h3>
        <a href="{{route('makeRevisor', compact('user'))}}">Rendi Revisor</a>

    </div>
</body>
</html>