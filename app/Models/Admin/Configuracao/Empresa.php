<?php

namespace App\Models\Admin\Configuracao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Empresa extends Model
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
        'razao_social',
        'celular',
        'email',
        'cnpj',
        'ie',
        'cep',
        'logradouro',
        'bairro_desc',
        'cidade_desc',
        'uf',
        'numero',
        'complemento',
        'logo',
        'ativo',
        'token',
        'tipo_empresa',
    ];

    /**
     * Scope a query to only include popular users.
     */
    public function scopeEmpresa(Builder $query)
    {
        $user = Auth::user();

        if($user->root == 1 || $user->admin == 1) {
            $listUsers = !empty($user->empresas->count()) ? $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray() : collect([]);
        } else {
            $listUsers = $user->empresas->pluck('id')->toArray();
        }

        return $query->whereIn('empresas.id', $listUsers);
    }

    public function listEmpresa(): HasMany
    {
        return $this->hasMany(Empresa::class,  'empresa_id', 'id');
    }

    public function empresaMatriz(): HasOne
    {
        return $this->hasOne(Empresa::class,  'id', 'empresa_id')->where('tipo_empresa', 'M');
    }

    public function pacote(): HasOne
    {
        return $this->hasOne(Pacote::class, 'id', 'empresa_id')->orderBy('id', 'desc');
    }

    public function isValidatePlans()
    {
        $limite = $this->pacote->qtd_empresa;
        $qtdEmpresa = $this->listEmpresa->count();

        $hasCadastro = true;

        if ($limite == $qtdEmpresa) {
            $hasCadastro = false;
        }

        return $hasCadastro;
    }
}
