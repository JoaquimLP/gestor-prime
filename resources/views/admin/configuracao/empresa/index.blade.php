<x-app-layout>
    @can("create", new App\Models\Admin\Configuracao\Empresa())
        <x-layout.heading title="Empresa" :route="route('configuracao.empresa.create')" btn-label="Cadastrar Empresa" />
    @else
        <x-layout.heading title="Empresa" />
    @endcan


    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.configuracao.empresa.show'" :hasEmpresa="true" :title="'Empresa'" :resource="'Admin\Configuracao\Empresa'" :columns="[
            ['label' => 'Nome', 'column' => 'nome'],
            ['label' => 'Cnpj', 'column' => 'cnpj'],
            ['label' => 'Celular', 'column' => 'celular'],
            ['label' => 'Email', 'column' => 'email'],
            ['label' => 'Cidade', 'column' => 'cidade_desc'],
            ['label' => 'UF', 'column' => 'uf'],
        ]"
            :routes="[
                ['url' => 'configuracao.empresa.edit', 'name' => 'Editar'],
                //['url' => 'configuracao.empresa.destroy', 'name' => 'Excluir'],
            ]" />
    </div>
</x-app-layout>
