<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Telefone extends Model
{
    use HasFactory;

    protected $table = "telefones";

    /** * @var array $fillable */
    protected $fillable = [
        'telefone',
        'celular',
        'telefonable_type',
        'telefonable_id'
    ];

    protected $hidden = [
        'telefonable_type',
        'elefonable_id',
        'created_at',
        'updated_at'
    ];

    ######################
    # RELACIONAMENTOS
    ######################
    public function telefonable(): MorphTo
    {
        return $this->morphTo();
    }
}