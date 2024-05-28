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
        'imagem',
        'user_id',
    ];

    ######################
    # RELACIONAMENTOS
    ######################
    public function pontos()
    {
        return $this->belongsToMany(Ponto::class, 'bicicleta_ponto')->withPivot('quantidade');
    }
}
