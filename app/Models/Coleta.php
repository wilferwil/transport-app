<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_remetente',
        'endereco_coleta',
        'descricao_mercadoria',
        'largura',
        'comprimento',
        'altura',
        'peso',
        'data_coleta',
        'hora_coleta',
        'transportadora_id',
        'user_id',
    ];

    public function transportadora()
    {
        return $this->belongsTo(User::class, 'transportadora_id');
    }
}
