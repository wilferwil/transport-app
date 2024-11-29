<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Coletas Solicitadas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <strong>Data:</strong> {{ date("d/m/Y", strtotime($coleta->data_coleta)); }} <br>
                    <strong>Hora:</strong> {{ $coleta->hora_coleta }} <br>
                    <strong>Transportadora:</strong> {{ $coleta->transportadora->name }} <br>
                    <strong>Dimensões:</strong> {{ $coleta->comprimento }}cm x {{ $coleta->largura }}cm x {{ $coleta->altura }}cm <br>
                    <strong>Peso:</strong> {{ $coleta->peso }}kg
                </li>
            @endforeach
        </ul>
    @endif

    <button onclick="window.location.href='{{ url()->previous() }}'" class="btn-back">
        Voltar
    </button>
</body>
</html>
