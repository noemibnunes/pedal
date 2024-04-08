<?php

namespace App\Models;

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
        'tipo',
        'quantidades',
        'imagem',
        'user_id'
    ];
}
