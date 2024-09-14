<x-app-layout>
    <x-layout.heading :title="'Contato de Emergência do (a) Dr. ' . $medico->nome" :route="route('cadastro.medico.contato-emergencia.create', $medico->id)" btn-label="Add Contato de Emergência" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">

        <x-table.table-component :resource="$contatoEmergencias" :delete="route('cadastro.medico.contato-emergencia.destroy', $medico->id)" :columns="[
            ['label' => 'Nome', 'column' => 'nome', 'upload' => false],
            ['label' => 'Tipo', 'column' => 'tipo', 'upload' => false],
            ['label' => 'Contato', 'column' => 'contato', 'upload' => false],
        ]" />

        <div class="mb-4.5 mt-4 flex flex-row">
            <div class="mr-2">
                <a href="{{ route('cadastro.medico.index') }}"
                    class="flex w-28 rounded-full justify-center bg-slate-600 py-3 font-medium text-white hover:bg-opacity-90">Voltar</a>
            </div>
        </div>
    </div>

</x-app-layout>
