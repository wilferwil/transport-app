<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Coletas Solicitadas</title>
</head>
<body>
    <h1>Lista de Coletas Solicitadas</h1>

    @if ($coletas->isEmpty())
        <p>Não há coletas solicitadas no momento.</p>
    @else
        <ul>
            @foreach ($coletas as $coleta)
                <li>
                    <strong>Remetente:</strong> {{ $coleta->nome_remetente }} <br>
                    <strong>Endereço:</strong> {{ $coleta->endereco_coleta }} <br>
                    <strong>Data:</strong> {{ $coleta->data_coleta }} <br>
                    <strong>Hora:</strong> {{ $coleta->hora_coleta }} <br>
                    <strong>Transportadora:</strong> {{ $coleta->transportadora->name }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
