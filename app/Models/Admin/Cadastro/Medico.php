<?php

namespace App\Models\Admin\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Medico extends Model
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
        'celular',
        'email',
        'crm',
        'rqe',
        'cpf',
        'rg',
        'func_public',
        'estado_civil',
        'cep',
        'logradouro',
        'bairro_desc',
        'cidade_desc',
        'uf',
        'numero',
        'complemento',
        'ativo',
        'data',
    ];

    public function documentos(): HasMany
    {
        return $this->hasMany(Arquivo::class);
    }

    public function contatoEmergencia(): HasMany
    {
        return $this->hasMany(ContatoEmergencia::class);
    }

    public function dadosBancarios(): HasMany
    {
        return $this->hasMany(DadosBancario::class);
    }

    public function contratos(): HasMany
    {
        return $this->hasMany(Contrato::class);
    }

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_medicos', 'medico_id', 'especialidade_id');
    }

    public function unidades()
    {
        return $this->belongsToMany(UnidadeAtendimento::class, 'unidade_atendimentos_medicos', 'medico_id', 'unidade_atendimento_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder){

            $user = Auth::user();

            if($user->root == 1 || $user->admin == 1) {
                $listUsers = !empty($user->empresas->count()) ? $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray() : collect([]);
            } else {
                $listUsers = $user->empresas->pluck('id')->toArray();
            }

            $builder->whereIn('empresa_id', $listUsers);
        });
    }

    public function getFuncao()
    {
        return $this->especialidades->first()->nome ?? null;
    }
}
