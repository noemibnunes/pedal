<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plano extends Model
{
    use HasFactory;

    protected $table = 'plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo_plano',
        'valor_plano',
        'descricao',
        'user_id'
    ];
    
    ######################
    # RELACIONAMENTOS
    ######################
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
