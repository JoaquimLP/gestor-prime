<?php

namespace App\Models\Admin\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Documento extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'empresa_id',
        'descricao',
        'contrato',
        'ativo'
    ];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder){

            $user = Auth::user();

            if($user->root == 1 || $user->admin == 1) {
                $listUsers = $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray();
            } else {
                $listUsers = $user->empresas->pluck('id')->toArray();
            }

            $builder->whereIn('empresa_id', $listUsers);
        });
    }

}
