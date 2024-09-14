@push('customer-scripts')
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
@endpush
<div class="max-w-full overflow-x-auto">
    <div class="min-w-[1170px] min-h-[72vh]">
        <div class="flex flex-col">
            <div class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto  dark:bg-boxdark-2">
                    <table class="min-w-full @if ($collect->count() < 5) mb-50 @else mb-10 @endif  border border-neutral-200 text-center text-sm font-light text-surface dark:bg-boxdark-2 dark:border-white/10 dark:text-white">
                        <thead class="border-b bg-slate-400 border-neutral-200 font-medium dark:border-white/10 text-white">
                            <tr>
                                @foreach ($columns as $column)
                                    <x-table.th>{{ $column['label'] }}</x-table.th>
                                @endforeach
                                @if (count($routes) > 0)
                                    <x-table.th>Ação</x-table.th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($collect as $item)
                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                    @foreach ($columns as $column)
                                        @if ($column["column"] == "descricao")
                                            <x-table.td>{{ limit(data_get($item, $column['column']), 30) }}</x-table.td>
                                        @else
                                            <x-table.td>{{ data_get($item, $column['column']) }}</x-table.td>
                                        @endif
                                    @endforeach

                                    @if (count($routes) > 0)
                                        <td class="px-4 py-3 flex items-center justify-center">
                                            <button id="{{ $item->id }}-dropdown-button"
                                                data-dropdown-toggle="{{ $item->id }}-dropdown"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="{{ $item->id }}-dropdown"
                                                class="hidden z-10 w-auto bg-blue-600 text-white text-start rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $item->id }}-dropdown-button" style="width: 11rem">
                                                    <li>
                                                        <a href="#" wire:click="show({{ $item->id }})" class="block p-1  hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            Ver
                                                        </a>
                                                    </li>

                                                    @foreach ($routes as $route)
                                                        <li>
                                                            <a href="{{ isset($route["url"]) ? route($route["url"], $item->id) : "#" }}" class="block p-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                {{ $route["name"] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="py-1 px-4  dark:bg-boxdark-2">
                    {{ $collect->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-modal.modal-show :showItem="$showItem" :include="$include" :title="$title" />
</div>
