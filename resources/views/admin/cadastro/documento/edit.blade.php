<x-app-layout>
    <x-layout.heading title="Atualizar Contrato" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.documento.update', $documento->id)" :method="'PUT'" :btnCancelRoute="route('cadastro.documento.index')">
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 w-full" name="descricao" placeholder="" :value="$documento->descricao" label="Titulo" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-1/3" :collection="$empresas" itemId="id" itemName="nome" name="empresa_id" :label="'Empresa'" :value="$documento->empresa_id" />
                </x-form.form-row>
                <x-form.form-col class="gap-1">

                    <x-form.text-quill name="contrato" label="Contrato" :value="$documento->contrato" />
                </x-form.form-col>
            </x-form.form-layout>
        </div>
    </div>
</x-app-layout>
