<x-app-layout>
    <x-layout.heading title="U.A" :route="route('cadastro.unidade-atendimento.create')" btn-label="Cadastrar U.A" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.cadastro.unidade-atendimento.show'" :title="'U.A'" :resource="'Admin\Cadastro\UnidadeAtendimento'" :columns="[
            ['label' => 'U.A', 'column' => 'nome'],
            ['label' => 'Bairro', 'column' => 'bairro_desc'],
            ['label' => 'Cidade', 'column' => 'cidade_desc'],
            ['label' => 'UF', 'column' => 'uf'],
        ]"
            :routes="[
                ['url' => 'cadastro.unidade-atendimento.edit', 'name' => 'Editar'],
                ['url' => 'cadastro.unidade-atendimento.destroy', 'name' => 'Excluir'],
            ]"
        />
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
