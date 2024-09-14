<x-app-layout>
    <x-layout.heading title="Usuário" :route="route('configuracao.usuario.create')" btn-label="Cadastrar Usuário" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.configuracao.usuario.show'" :hasEmpresa="true" :title="'Usuário'" :resource="'Admin\Configuracao\User'" :columns="[
            ['label' => 'Nome', 'column' => 'name'],
            ['label' => 'Celular', 'column' => 'celular'],
            ['label' => 'Email', 'column' => 'email'],
        ]"
            :routes="[
                ['url' => 'configuracao.usuario.edit', 'name' => 'Editar'],
                ['url' => 'configuracao.usuario.destroy', 'name' => 'Excluir'],
            ]" />
    </div>
</x-app-layout>
