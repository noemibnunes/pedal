<?php

namespace App\Models;

use App\Models\Plano;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sobrenome',
        'cpf',
        'email',
        'password',
        'imagem_perfil',
        'data_nascimento',
        'plano_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    ######################
    # RELACIONAMENTOS
    ######################
    public function telefone(): MorphOne
    {
        return $this->morphOne(Telefone::class, 'telefonable');
    }

    public function endereco(): MorphOne
    {
        return $this->morphOne(Endereco::class, 'endereable');
    }

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

}
