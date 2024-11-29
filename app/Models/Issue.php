<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'description',
        'order_number',
    ];

    /**
     * Relacionamento com o usuário que registrou o problema.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
