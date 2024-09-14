<x-app-layout>
    <x-layout.heading :title="'Contato de Emergência do (a) Dr. ' . $medico->nome" :route="route('cadastro.medico.contrato.create', $medico->id)" btn-label="Add Contato de Emergência" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">
        <x-form.form-layout :route="route('cadastro.medico.contrato.gerar.save-pdf', [$medico->id, $contrato->id])" :method="'POST'" :btnCancelRoute="route('cadastro.medico.contrato.index', $medico->id)">
            <x-form.form-col class="gap-1">
                <x-form.input-file class="my-2 mx-1 w-full" name="path" placeholder="" label="Contrato" value="" />
            </x-form.form-col>
        </x-form.form-layout>
    </div>

</x-app-layout>
