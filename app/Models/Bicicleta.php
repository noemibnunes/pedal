<?php

namespace App\Models;

use App\Models\Ponto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bicicleta extends Model
{
    use HasFactory;

    protected $table = 'bicycles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modelo',
        'disponibilidade',
        'valor_aluguel',
        'descricao',
        'quantidades',
        'imagem',
        'user_id',
        'ponto_id'
    ];

    ######################
    # RELACIONAMENTOS
    ######################
    public function ponto()
    {
        return $this->belongsTo(Ponto::class, 'ponto_id', 'id');
    }
}
