@php
    $route_name = Route::currentRouteName();
@endphp

@if (str_contains($route_name, 'ativacao'))
    <ul class="mb-6 flex flex-col gap-1.5">
        <li>
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                href="{{ route('dashboard') }}">
                <x-icons.dashboard />
                Empresas
            </a>
        </li>
    </ul>
@else
    <ul class="mb-6 flex flex-col gap-1.5">
        <li>
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                href="{{ route('dashboard') }}">
                <x-icons.dashboard />
                Dashboard
            </a>
        </li>

        <!-- Menu Item Dashboard -->
        <li x-data="{{ route_cadastro($route_name) }}">
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                @click="$event.preventDefault(); open = !open"
                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button" href="#">
                <x-icons.register />
                Cadastro
                <x-icons.arrow />
            </a>
            <!-- Dropdown Menu Start -->
            <div x-show="open" class="translate transform overflow-hidden">
                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                    <li>
                        <x-layout.include.link-menu :labelRoute="'medico'" :route="route('cadastro.medico.index')" btn-label="Médicos" />
                    </li>
                    <li>
                        <x-layout.include.link-menu :labelRoute="'especialidade'" :route="route('cadastro.especialidade.index')" btn-label="Especialidade" />
                    </li>
                    <li>
                        <x-layout.include.link-menu :labelRoute="'unidade-atendimento'" :route="route('cadastro.unidade-atendimento.index')" btn-label="U.A" />
                    </li>
                    <li>
                        <x-layout.include.link-menu :route="route('cadastro.documento.index')" :labelRoute="'documento'" btn-label="Contratos" />
                    </li>
                </ul>
            </div>
        </li>
        <!-- Menu Item Dashboard -->
        <li x-data="{ isActive: false, open: false }">
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                @click="$event.preventDefault(); open = !open"
                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button" href="#">
                <x-icons.chart />
                Gestão de Escala
                <x-icons.arrow />
            </a>
            <!-- Dropdown Menu Start -->
            <div x-show="open" class="translate transform overflow-hidden">
                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                    <li>
                        <x-layout.include.link-menu :route="'#'" btn-label="Escala" />
                    </li>
                </ul>
            </div>
        </li>
        <!-- Menu Item Dashboard -->
        <li x-data="{ isActive: false, open: false }">
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                @click="$event.preventDefault(); open = !open"
                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button" href="#">
                <x-icons.check-circle />
                Controle de Ponto
                <x-icons.arrow />
            </a>
            <!-- Dropdown Menu Start -->
            <div x-show="open" class="translate transform overflow-hidden">
                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                    <li>
                        <x-layout.include.link-menu :route="'#'" btn-label="Resgistro de Ponto" />
                    </li>
                </ul>
            </div>
        </li>
        <!-- Menu Item Dashboard -->
        <li x-data="{{ route_configuracao($route_name) }}">
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                @click="$event.preventDefault(); open = !open"
                :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button" href="#">
                <x-icons.gear />
                Configuracao
                <x-icons.arrow />
            </a>
            <!-- Dropdown Menu Start -->
            <div x-show="open" class="translate transform overflow-hidden">
                <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                    <li>
                        <x-layout.include.link-menu :labelRoute="'empresa'" :route="route('configuracao.empresa.index')" btn-label="Empresa" />
                    </li>
                    <li>
                        <x-layout.include.link-menu :labelRoute="'gestao-contrato'" :route="route('configuracao.gestao-contrato.index')"
                            btn-label="Gestão de Contratos" />
                    </li>
                    <li>
                        <x-layout.include.link-menu :labelRoute="'usuario'" :route="route('configuracao.usuario.index')" btn-label="Usuarios" />
                    </li>
                </ul>
            </div>
        </li>

    </ul>
@endif
