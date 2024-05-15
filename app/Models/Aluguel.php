<?php

namespace App\Models;

use App\Models\Ponto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluguel extends Model
{
    use HasFactory;

    protected $table = 'rents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bicicleta_id',
        'user_id',
        'plano_id',
        'valor_aluguel',
        'cartao_id',
        'tipo_pagamento'
    ];

    ######################
    # RELACIONAMENTOS
    ######################
   
}
