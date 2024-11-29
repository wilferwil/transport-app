<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Bem-vindo,<br>{{ auth()->user()->name }}</h1>
    <p>Você está logado como {{$user->account_type}}.</p>
    
    @if ($user->account_type == "vendedor")
        <div>
            <p><strong><a href="/coletas/create">Solicitar coleta de mercadoria</a></strong></p>
            <p><a href="/coletas">Visualizar coletas solicitadas</a></p>
            <p><a href="/transportadoras">Transportadoras disponíveis</a></p>
            <hr>
        </div>
    @else
        <div>
            <p><strong><a href="/coletas">Coletas solicitadas por vendedor</a></strong></p>
            <p><strong><a href="/notificar-problema">Notificar extravio ou avaria de mercadoria</a></strong></p>
            <hr>
        </div>
    @endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <button onclick="window.location.href='{{ url()->previous() }}'" class="btn-back">
        Voltar
    </button>
</body>
</html>
