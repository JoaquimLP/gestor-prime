<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-400 text-md font-bold mb-2" for="pair">
                        Choose your cities:
                    </label>
                    <select
                        class="js-example-basic-multiple" style="width: 100%"
                        data-placeholder="Select one or more cities..."
                        data-allow-clear="false"
                        multiple="multiple"
                        title="Select city...">
                        <option>Amsterdam</option>
                        <option>Rotterdam</option>
                        <option>Den Haag</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        @include('admin.cadastro.medico.documento.include.script')
    @endpush
</x-app-layout>
