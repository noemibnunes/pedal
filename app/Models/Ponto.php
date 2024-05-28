<?php

namespace App\Models;

use App\Models\user;
use App\Models\Bicicleta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ponto extends Model
{
    protected $table = 'points';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'descricao',
        'user_id'
    ];

    ######################
    # RELACIONAMENTOS
    ######################
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bicicletas()
    {
        return $this->belongsToMany(Bicicleta::class, 'bicicleta_ponto')->withPivot('quantidade');
    }

}
