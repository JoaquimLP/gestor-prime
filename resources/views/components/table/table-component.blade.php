@push('customer-scripts')
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
@endpush
<div class="max-w-full overflow-x-auto">
    <div class="min-w-[770px]">
        <div class="flex flex-col">
            <div class="bg-white relative sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto  dark:bg-boxdark-2">
                    <table class="min-w-full mb-1 border border-neutral-200 text-center text-sm font-light text-surface dark:bg-boxdark-2 dark:border-white/10 dark:text-white">
                        <thead class="border-b bg-slate-800 border-neutral-200 font-medium dark:border-white/10 text-white">
                            <tr>
                                @foreach ($columns as $column)
                                    <x-table.th>{{ $column['label'] }}</x-table.th>
                                @endforeach
                                @if (isset($delete))
                                    <x-table.th>...</x-table.th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resource as $item)
                                <tr class="border-b border-neutral-200 dark:border-white/10 text-center">
                                    @foreach ($columns as $column)
                                        @if ($column["upload"] == true)
                                            <x-table.td><a href="{{ temporary_url_foto(data_get($item, $column['column']))}}" target="_blank" class="text-center">Ver</a></x-table.td>
                                        @elseif (isset($column["date"]) && $column["date"] == true)
                                            <x-table.td>{{ date_mask(data_get($item, $column['column'])) }}</x-table.td>
                                        @else
                                            <x-table.td>{{ data_get($item, $column['column']) }}</x-table.td>
                                        @endif
                                    @endforeach

                                    @if (isset($delete))
                                        <x-table.td >
                                            <a href="{{ $delete . '?item_id='. $item->id }}" class="text-center">Excluir</a>
                                        </x-table.td>
                                    @endif
                                    @if (isset($delete))
                                        <x-table.td >
                                            <a href="{{ $delete . '?item_id='. $item->id }}" class="text-center">Excluir</a>
                                        </x-table.td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
