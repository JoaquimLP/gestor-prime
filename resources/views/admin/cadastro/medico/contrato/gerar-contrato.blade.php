<x-app-layout>
    <x-layout.heading :title="'Contrato do (a) Dr. ' . $medico->nome" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <x-table.table-custom
            class="text-surface table-custom @if ($contratos->count() < 5) mb-50 @else mb-10 @endif">
            <x-table.thead>
                <x-table.tr>
                    <x-table.th>Descrição</x-table.th>
                    <x-table.th>...</x-table.th>
                </x-table.tr>
                <x-table.tbody>
                    @foreach ($documentos as $documento)
                        <x-table.tr>
                            <x-table.td>{{ $documento->descricao }}</x-table.td>
                            <x-table.td>
                                <a href="{{ route('cadastro.medico.contrato.gerar.documento-pdf', [$medico->id, $contrato->id, $documento->id]) }}"
                                    target="_blank" class="text-center">Assinar</a>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.thead>
        </x-table.table-custom>
        <div class="mb-4.5 mt-4 flex flex-row">
            <div class="mr-2">
                <a href="{{ route('cadastro.medico.contrato.index', $medico->id) }}"
                    class="flex w-28 rounded-full justify-center bg-slate-600 py-3 font-medium text-white hover:bg-opacity-90">Voltar</a>
            </div>
        </div>
    </div>

</x-app-layout>
