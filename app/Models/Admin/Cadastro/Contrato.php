<?php

namespace App\Models\Admin\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'medico_id',
        'descricao',
        'path',
        'start_date',
        'end_date',
        'clausula_adicional',
        'situacao',
        'ativo',
    ];
}
