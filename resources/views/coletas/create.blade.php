<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Coleta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Solicitação de Coleta</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('coletas.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome_remetente">Nome do Remetente:</label>
            <input type="text" id="nome_remetente" name="nome_remetente" required>
        </div>
        <div>
            <label for="endereco_coleta">Endereço de Coleta:</label>
            <input type="text" id="endereco_coleta" name="endereco_coleta" required>
        </div>
        <div>
            <label for="descricao_mercadoria">Descrição da Mercadoria:</label>
            <textarea id="descricao_mercadoria" name="descricao_mercadoria" required></textarea>
        </div>
        <div>
            <label for="largura">Largura (cm):</label>
            <input type="number" id="largura" name="largura" step="0.01" required>
        </div>
        <div>
            <label for="comprimento">Comprimento (cm):</label>
            <input type="number" id="comprimento" name="comprimento" step="0.01" required>
        </div>
        <div>
            <label for="altura">Altura (cm):</label>
            <input type="number" id="altura" name="altura" step="0.01" required>
        </div>
        <div>
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" step="0.01" required>
        </div>
        <div>
            <label for="data_coleta">Data da Coleta:</label>
            <input type="date" id="data_coleta" name="data_coleta" required>
        </div>
        <div>
            <label for="hora_coleta">Hora da Coleta:</label>
            <input type="time" id="hora_coleta" name="hora_coleta" required>
        </div>
        <div>
            <label for="transportadora_id">Selecione a Transportadora:</label>
            <select id="transportadora_id" name="transportadora_id" required>
                @foreach ($transportadoras as $transportadora)
                    <option value="{{ $transportadora->id }}">{{ $transportadora->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Solicitar Coleta</button>
    </form>

    <button onclick="window.location.href='{{ url()->previous() }}'" class="btn-back">
        Voltar
    </button>
</body>
</html>
