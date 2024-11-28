<?php

namespace App\Http\Controllers;

use App\Models\TransportadoraRating;
use App\Models\User;
use Illuminate\Http\Request;

class TransportadoraRatingController extends Controller
{
    public function create($transportadora_id)
    {
        $transportadora = User::findOrFail($transportadora_id);
        return view('ratings.create', ['transportadora' => $transportadora]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'transportadora_id' => 'required|exists:users,id',
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:1000',
        ]);

        TransportadoraRating::create([
            'vendedor_id' => auth()->id(),
            'transportadora_id' => $request->transportadora_id,
            'nota' => $request->nota,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('ratings.create', $request->transportadora_id)
            ->with('success', 'Avaliação registrada com sucesso!');
    }

    public function show($transportadora_id)
    {
        $transportadora = User::findOrFail($transportadora_id);
        $ratings = TransportadoraRating::where('transportadora_id', $transportadora_id)->get();

        return view('ratings.show', [
            'transportadora' => $transportadora,
            'ratings' => $ratings,
        ]);
    }

}
