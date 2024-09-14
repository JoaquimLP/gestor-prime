<x-app-layout>
    <x-layout.heading :title="'Documentos do (a) Dr. ' . $medico->nome" :route="route('cadastro.medico.documentos.create', $medico->id)" btn-label="Anexar do Documentos" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">

        <x-table.table-component :resource="$documentos" :delete="route('cadastro.medico.documentos.destroy', $medico->id)" :columns="[
            ['label' => 'Descrição', 'column' => 'descricao', 'upload' => false],
            ['label' => 'Link', 'column' => 'path', 'upload' => true],
        ]" />

        <div class="mb-4.5 mt-4 flex flex-row">
            <div class="mr-2">
                <a href="{{ route('cadastro.medico.index') }}"
                    class="flex w-28 rounded-full justify-center bg-slate-600 py-3 font-medium text-white hover:bg-opacity-90">Voltar</a>
            </div>
        </div>
    </div>

</x-app-layout>
