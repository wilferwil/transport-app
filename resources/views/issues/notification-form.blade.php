<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificar Avaria ou Extravio de Mercadoria</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }
        button {
            background-color: #1a73e8;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #155bb5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notificar Problema</h1>
        @if (session('success'))
            <p style="color: lightgreen;">{{ session('success') }}</p>
        @endif
        @if ($errors->any())
            <p style="color: red;">{{ $errors->first() }}</p>
        @endif
        <form action="{{ route('issues.submit') }}" method="POST">
            @csrf
            <label for="order_number">Número do Pedido:</label>
            <input type="number" id="order_number" name="order_number" placeholder="Digite o número do pedido" required>

            <label for="description">Descrição da Mercadoria:</label>
            <textarea id="description" name="description" placeholder="Detalhe a mercadoria..." rows="4" required></textarea>

            <label for="problem_description">Descrição do Problema:</label>
            <textarea id="problem_description" name="problem_description" placeholder="Explique o problema ocorrido..." rows="4" required></textarea>

            <label for="type">Tipo de Problema:</label>
            <select id="type" name="type" required>
                <option value="avaria">Avaria</option>
                <option value="extravio">Extravio</option>
            </select>

            <button type="submit">Enviar Notificação</button>
        </form>
        <button onclick="window.location.href='{{ url()->previous() }}'" class="btn-back">
            Voltar
        </button>
    </div>
</body>
</html>
