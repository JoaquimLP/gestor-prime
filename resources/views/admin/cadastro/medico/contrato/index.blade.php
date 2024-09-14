<x-app-layout>
    <x-layout.heading :title="'Contato de Emergência do (a) Dr. ' . $medico->nome" :route="route('cadastro.medico.contrato.create', $medico->id)" btn-label="Add Contrato" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <x-table.table-custom
            class="text-surface table-custom @if ($contratos->count() < 5) mb-50 @else mb-10 @endif">
            <x-table.thead>
                <x-table.tr>
                    <x-table.th>Data de Inicio</x-table.th>
                    <x-table.th>Data de Final</x-table.th>
                    <x-table.th>Descrição</x-table.th>
                    <x-table.th>Situação</x-table.th>
                    <x-table.th>Contrato</x-table.th>
                    <x-table.th>...</x-table.th>
                </x-table.tr>
                <x-table.tbody>
                    <x-table.tr>
                        @foreach ($contratos as $contrato)
                            <x-table.td>{{ date_mask($contrato->start_date) }}</x-table.td>
                            <x-table.td>{{ date_mask($contrato->end_date) }}</x-table.td>
                            <x-table.td>{{ $contrato->descricao }}</x-table.td>
                            <x-table.td>{{ situacao_contrato($contrato->situacao) }}</x-table.td>
                            <x-table.td>
                                @if ($contrato->path)
                                    <a href="{{ temporary_url_foto($contrato->path) }}" target="_blank"
                                        class="text-center">Ver</a>
                                @endif
                            </x-table.td>

                            <td class="px-4 py-3 flex items-center justify-center">
                                <x-dropdown.dropdown-menu :itemId="$contrato->id" :routes="[
                                    [
                                        'url' => route('cadastro.medico.contrato.gerar', [$medico->id, $contrato->id]),
                                        'name' => 'Gerar Contrato',
                                    ],
                                    [
                                        'url' => route('cadastro.medico.contrato.gerar.upload-pdf', [
                                            $medico->id,
                                            $contrato->id,
                                        ]),
                                        'name' => 'Anexar Contrato Assinado',
                                    ],
                                ]" />
                            </td>
                        @endforeach
                    </x-table.tr>
                </x-table.tbody>
            </x-table.thead>
        </x-table.table-custom>
        <div class="mb-4.5 mt-4 flex flex-row">
            <div class="mr-2">
                <a href="{{ route('cadastro.medico.index') }}"
                    class="flex w-28 rounded-full justify-center bg-slate-600 py-3 font-medium text-white hover:bg-opacity-90">Voltar</a>
            </div>
        </div>
    </div>

</x-app-layout>
