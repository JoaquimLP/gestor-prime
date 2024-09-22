<?php

namespace App\Models\Admin\Configuracao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class GestaoContrato extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'empresa_id',
        'contratada',
        'cidade_desc',
        'uf',
        'start_date',
        'end_date',
        'valor_hora',
        'valor_total',
        'qtd_especialista',
        'ativo',
        'path',
    ];

      /**
     * Scope a query to only include popular users.
     */
    public function scopeEmpresa(Builder $query)
    {
        $user = Auth::user();

        if($user->root == 1 || $user->admin == 1) {
            $listUsers = !empty($user->empresas->count()) ? $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray() : collect([]);
            $query = $query->whereIn('empresa_id', $listUsers);
        } else {
            $listUsers = $user->empresas->pluck('id')->toArray() ?? [];

            $query = $query->whereIn('empresa_id', $listUsers);
        }

        return $query;
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'users_empresas', 'user_id', 'empresa_id');
    }
}
