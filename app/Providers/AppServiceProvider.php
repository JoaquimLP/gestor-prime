<?php

namespace App\Providers;

use App\Models\Admin\Configuracao\{
    Empresa
};
use App\Policies\Admin\Configuracao\{
    EmpresaPolicy
};
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Empresa::class, EmpresaPolicy::class);
    }
}
