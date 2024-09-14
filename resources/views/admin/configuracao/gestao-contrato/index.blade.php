<x-app-layout>
    <x-layout.heading title="Gestão de Contrato" :route="route('configuracao.gestao-contrato.create')" btn-label="Cadastrar Contrato" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <livewire:table.table-component :include="'admin.configuracao.gestao-contrato.show'" :hasEmpresa="true" :title="'Contrato'" :resource="'Admin\Configuracao\GestaoContrato'" :columns="[
            ['label' => 'Contratada', 'column' => 'contratada'],
            ['label' => 'Município', 'column' => 'cidade_desc'],
            ['label' => 'Estado', 'column' => 'uf'],
            ['label' => 'Vigência inicio', 'column' => 'start_date'],
            ['label' => 'Vigência fim', 'column' => 'end_date'],
            ['label' => 'Valor por Hora', 'column' => 'valor_hora'],
            ['label' => 'Valor Total', 'column' => 'valor_total'],
            ['label' => 'Quantidade de Especialistas', 'column' => 'qtd_especialista'],
        ]"
            :routes="[
                ['url' => 'configuracao.gestao-contrato.edit', 'name' => 'Editar'],
                ['url' => 'configuracao.gestao-contrato.destroy', 'name' => 'Excluir'],
            ]" />
    </div>
</x-app-layout>
