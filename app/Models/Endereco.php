<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endereco extends Model 
{
    use HasFactory;

    protected $table = 'enderecos';
    protected $hidden = [
        'endereable_type',
        'endereable_id',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array $fillable
    */
    protected $fillable = [
        'tipo_logradouro',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'endereable_type',
        'endereable_id'
    ];

    protected $casts = [
        'cep'
    ];

    ######################
    # RELACIONAMENTOS
    ######################
    public function endereable(): MorphTo
    {
        return $this->morphTo();
    }

    ######################
    # MUTATORS AND CASTING
    ######################
    public function cep(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
               return substr_replace($value, '-', 5, 0);
            }
        );
    }
}