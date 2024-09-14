<x-app-layout>
    <x-layout.heading title="Especialidade" :route="route('cadastro.especialidade.create')" btn-label="Cadastrar Especialidade" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.cadastro.especialidade.show'" :title="'Especialidade'" :resource="'Admin\Cadastro\Especialidade'" :columns="[
            ['label' => 'Especialidades', 'column' => 'nome'],
            ['label' => 'Descricao', 'column' => 'descricao'],
        ]"
            :routes="[
                ['url' => 'cadastro.especialidade.edit', 'name' => 'Editar'],
                ['url' => 'cadastro.especialidade.destroy', 'name' => 'Excluir'],
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
