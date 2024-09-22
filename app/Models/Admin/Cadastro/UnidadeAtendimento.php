<?php

namespace App\Models\Admin\Cadastro;

use App\Models\Admin\Configuracao\GestaoContrato;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UnidadeAtendimento extends Model
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
        'description',
        'cep',
        'logradouro',
        'bairro_desc',
        'cidade_desc',
        'uf',
        'numero',
        'complemento',
        'ativo'
    ];

    public function gestaoContrato()
    {
        return $this->belongsToMany(GestaoContrato::class, 'gestao_contrato_unidades', 'unidade_atendimento_id', 'gestao_contrato_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder){

            $user = Auth::user();

            if($user->root == 1 || $user->admin == 1) {
                $listUsers = !empty($user->empresas->count()) ? $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray() : collect([]);
                $builder->whereIn('empresa_id', $listUsers);
            } else {
                $listUsers = $user->empresas->pluck('id')->toArray();

                $builder = $builder->whereHas('gestaoContrato', function (Builder $query) use ($listUsers) {
                    $query->whereIn('gestao_contratos.empresa_id', $listUsers);
                });
            }
        });
    }
}
