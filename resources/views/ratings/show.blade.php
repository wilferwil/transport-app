<h1>Avaliações de {{ $transportadora->name }}</h1>

@if ($ratings->isEmpty())
    <p>Sem avaliações no momento.</p>
@else
    @foreach ($ratings as $rating)
        <div>
            <p><strong>Nota:</strong> {{ $rating->nota }}</p>
            <p><strong>Comentário:</strong> {{ $rating->comentario }}</p>
            <p><strong>Vendedor:</strong> {{ $rating->vendedor->name }}</p>
            <hr>
        </div>
    @endforeach
@endif
