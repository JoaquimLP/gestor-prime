<x-app-layout>
    <x-layout.heading title="Empresa" :route="route('ativacao.empresa.create')" btn-label="Cadastrar Empresa" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'ativacao.empresa.show'" :title="'Médico'" :resource="'Admin\Configuracao\Empresa'" :columns="[
            ['label' => 'Nome', 'column' => 'nome'],
            ['label' => 'Cnpj', 'column' => 'cnpj'],
            ['label' => 'Celular', 'column' => 'celular'],
            ['label' => 'Email', 'column' => 'email'],
            ['label' => 'Cidade', 'column' => 'cidade_desc'],
            ['label' => 'UF', 'column' => 'uf'],
        ]"
            :routes="[
                // ['url' => 'ativacao.empresa.edit', 'name' => 'Editar'],
                //['url' => 'ativacao.empresa.destroy', 'name' => 'Excluir'],
                ['url' => 'ativacao.empresa.alterar', 'name' => 'Acessar'],
            ]" />
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
