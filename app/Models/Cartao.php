<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cartao extends Model
{
    use HasFactory;

    protected $table = 'cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_titular',
        'numero_cartao',
        'data_validade',
        'tipo_cartao',
        'bandeira_cartao',
        'apelido_cartao'
    ];
    
    ######################
    # RELACIONAMENTOS
    ######################
   
}
