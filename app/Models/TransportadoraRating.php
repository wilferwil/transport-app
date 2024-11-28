<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportadoraRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendedor_id',
        'transportadora_id',
        'nota',
        'comentario',
    ];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function transportadora()
    {
        return $this->belongsTo(User::class, 'transportadora_id');
    }
}
