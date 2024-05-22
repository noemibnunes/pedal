<?php

namespace App\Models;

use App\Models\User;
use App\Models\Plano;
use App\Models\Ponto;
use App\Models\Cartao;
use App\Models\Bicicleta;
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bicicleta()
    {
        return $this->belongsTo(Bicicleta::class);
    }

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    public function cartao()
    {
        return $this->belongsTo(Cartao::class);
    }
   
}
