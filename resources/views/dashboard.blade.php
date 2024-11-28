<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Bem-vindo, {{ auth()->user()->name }}</h1>
    <p>Você está logado como um vendedor.</p>

    <div>
        <p><strong><a href="/coletas/create">Solicitar coleta de mercadoria</a></strong></p>
        <p><a href="/coletas">Visualizar coletas solicitadas</a></p>
        <hr>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
