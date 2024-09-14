<x-app-layout>
    <x-layout.heading title="Contrato" :route="route('cadastro.documento.create')" btn-label="Cadastrar Contrato" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.cadastro.documento.show'" :title="'Documentos'" :resource="'Admin\Cadastro\Documento'" :columns="[['label' => 'Titulo', 'column' => 'descricao']]"
            :routes="[
                ['url' => 'cadastro.documento.edit', 'name' => 'Editar'],
                ['url' => 'cadastro.documento.destroy', 'name' => 'Excluir'],
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
