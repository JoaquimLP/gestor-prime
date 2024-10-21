<x-app-layout>
    <x-layout.heading title="Médico" :route="route('cadastro.medico.create')" btn-label="Cadastrar Médico" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.cadastro.medico.show'" :title="'Médico'" :resource="'Admin\Cadastro\Medico'" :columns="[
            ['label' => 'Médico', 'column' => 'nome'],
            ['label' => 'Função', 'column' => '', 'function' => 'getFuncao'],
            ['label' => 'Celular', 'column' => 'celular'],
            ['label' => 'Email', 'column' => 'email'],
            ['label' => 'Cidade', 'column' => 'cidade_desc'],
            ['label' => 'UF', 'column' => 'uf'],
        ]"
            :routes="[
                ['url' => 'cadastro.medico.documentos.index', 'name' => 'Anexar documentos'],
                ['url' => 'cadastro.medico.contato-emergencia.index', 'name' => 'Contato de emergência'],
                ['url' => 'cadastro.medico.dados-bancario.index', 'name' => 'Dados Bancários'],
                ['url' => 'cadastro.medico.contrato.index', 'name' => 'Contrato'],
                ['url' => 'cadastro.medico.edit', 'name' => 'Editar'],
                ['url' => 'cadastro.medico.destroy', 'name' => 'Excluir'],
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
