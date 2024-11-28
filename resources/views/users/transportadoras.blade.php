<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Transportadoras</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Lista de Transportadoras</h1>

    @if ($transportadoras->isEmpty())
        <p>Não há transportadoras cadastradas no momento.</p>
    @else
        <ul>
            @foreach ($transportadoras as $transportadora)
                <li>
                    <strong>Nome:</strong> {{ $transportadora->name }} <br>
                    <strong>E-mail:</strong> {{ $transportadora->email }} <br>
                    <strong>Nota da Transportadora:</strong> {{ $transportadora->rating->avg('nota') ?? "Sem avaliações" }}<br>
                    <strong><a href="/ratings/{{ $transportadora->id }}/create">Avaliar Transportadora</a></strong> <br>
                    <strong><a href="/ratings/{{ $transportadora->id }}">Visualizar Avaliações</a></strong> <br>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
