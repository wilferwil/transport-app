<?php

namespace App\Http\Controllers;

use App\Models\Coleta;
use App\Models\User;
use Illuminate\Http\Request;

class ColetaController extends Controller
{
    // Display the form to request a new coleta
    public function create()
    {
        $transportadoras = User::where('account_type', 'transportadora')->get();
        return view('coletas.create', ['transportadoras' => $transportadoras]);
    }

    // Store the coleta request
    public function store(Request $request)
    {
        $request->validate([
            'nome_remetente' => 'required|string|max:255',
            'endereco_coleta' => 'required|string|max:255',
            'descricao_mercadoria' => 'required|string',
            'largura' => 'required|numeric|min:0',
            'comprimento' => 'required|numeric|min:0',
            'altura' => 'required|numeric|min:0',
            'peso' => 'required|numeric|min:0',
            'data_coleta' => 'required|date',
            'hora_coleta' => 'required',
            'transportadora_id' => 'required|exists:users,id',
        ]);

        Coleta::create($request->all());
        return redirect()->route('coletas.create')->with('success', 'Solicitação de coleta criada com sucesso!');
    }

    // List coletas for transportadoras
    public function index()
    {
        $coletas = Coleta::with('transportadora')->get();
        return view('coletas.index', ['coletas' => $coletas]);
    }
}
