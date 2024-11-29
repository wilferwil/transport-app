<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Transportadora</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Avaliar Transportadora:<br>{{ $transportadora->name }}</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="transportadora_id" value="{{ $transportadora->id }}">

        <div>
            <label for="nota">Nota (1 a 5):</label>
            <select id="nota" name="nota" required>
                <option value="1">1 - Muito Ruim</option>
                <option value="2">2 - Ruim</option>
                <option value="3">3 - Regular</option>
                <option value="4">4 - Bom</option>
                <option value="5">5 - Excelente</option>
            </select>
        </div>

        <div>
            <label for="comentario">Comentário (Opcional):</label>
            <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea>
        </div>

        <button type="submit">Enviar Avaliação</button>
    </form>

    <button onclick="window.location.href='{{ url()->previous() }}'" class="btn-back">
        Voltar
    </button>
</body>
</html>
