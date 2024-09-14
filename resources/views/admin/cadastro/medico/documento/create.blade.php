<x-app-layout>
    <x-layout.heading :title="'Anexar Documentos do (a) Dr. ' . $medico->nome" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.medico.documentos.store', $medico->id)" :method="'POST'" :btnCancelRoute="route('cadastro.medico.documentos.index', $medico->id)">
                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full" name="descricao" placeholder="CPF/RG (frente e verso)"
                        label="Descrição" value="" :wireInput="'wire:model=teste'" />
                </x-form.form-col>
                <x-form.form-col class="gap-1">
                    <x-form.dropzone name="documentos[]" />
                </x-form.form-col>

            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.cadastro.medico.documento.include.script')
    @endpush
</x-app-layout>
