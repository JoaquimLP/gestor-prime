<x-app-layout>
    <x-layout.heading :title="'Adicionar Contato de Emergência do (a) Dr. ' . $medico->nome" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.medico.contato-emergencia.store', $medico->id)" :method="'POST'" :btnCancelRoute="route('cadastro.medico.contato-emergencia.index', $medico->id)">
                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full" name="nome" placeholder="Ana Prima" label="Descrição" value="" :wireInput="'wire:model=teste'" />
                </x-form.form-col>
                <x-form.form-row class="gap-1">
                    <x-form.select class="my-2 mx-1 w-full lg:w-1/3" :collection="$tipoContato" itemId="id" itemName="name" name="tipo" :label="'Tipo Contato'" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" name="contato" placeholder="" label="Contato" value="" />
                </x-form.form-row>
            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.cadastro.medico.documento.include.script')
    @endpush
</x-app-layout>
