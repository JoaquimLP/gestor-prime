<?php

namespace App\Models\Admin\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Especialidade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'empresa_id',
        'nome',
        'descricao',
        'ativo'
    ];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder){
            $user = Auth::user();

            if($user->root == 1 || $user->admin == 1) {
                $listUsers = !empty($user->empresas->count()) ? $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray() : collect([]);
            } else {
                $listUsers = [$user->empresas->first()->empresaMatriz->id];
            }

            return $builder->whereIn('empresa_id', $listUsers);
        });
    }
}
