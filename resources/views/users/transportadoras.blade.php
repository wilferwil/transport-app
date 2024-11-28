<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Transportadoras</title>
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
                    <strong>E-mail:</strong> {{ $transportadora->email }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
