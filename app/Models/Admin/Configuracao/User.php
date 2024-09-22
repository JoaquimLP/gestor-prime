<?php

namespace App\Models\Admin\Configuracao;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

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
        'email',
        'admin',
        'celular',
        'medico_id',
        'perfil_id',
        'ativo',
        'data_nascimento',
        'root',
        'password',
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

        /**
     * Scope a query to only include popular users.
     */
    public function scopeEmpresa(Builder $query)
    {
        $user = Auth::user();

        if($user->root == 1 || $user->admin == 1) {
            $listUsers =!empty($user->empresas->count()) ? $user->empresas->where('tipo_empresa', 'M')->first()->listEmpresa->pluck('id')->toArray() : collect([]);
            $query = $query->whereHas('empresas', function (Builder $query) use ($listUsers) {
                $query->whereIn('empresas.id', $listUsers);
            });
        } else {
            $listUsers = $user->empresas->pluck('id')->toArray();

            $query = $query->whereHas('empresas', function (Builder $query) use ($listUsers) {
                $query->whereIn('empresas.id', $listUsers);
            });
        }

        return $query;
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'users_empresas', 'user_id', 'empresa_id');
    }


}
