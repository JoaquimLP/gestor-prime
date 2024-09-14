<x-app-layout>
    <x-layout.heading title="Adicionar Contrato" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('configuracao.gestao-contrato.store')" :method="'POST'" :btnCancelRoute="route('configuracao.gestao-contrato.index')">
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-2/2" name="contratada" placeholder="" label="Contratada" value="" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-2/3" :collection="$empresas" itemId="id" itemName="nome" name="empresa_id" :label="'Empresa'" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" name="uf" placeholder="" label="UF" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" name="cidade_desc" placeholder="" label="Cidade" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text-money class="my-2 mx-1 w-full lg:w-1/3" name="valor_hora" placeholder="" label="Valor por Hora:" value="" />
                    <x-form.input-text-money class="my-2 mx-1 w-full lg:w-1/3" name="valor_total" placeholder="" label="Valor Total:" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="999999999999999" name="qtd_especialista" placeholder="" label="Quantidade de Especialistas:" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" mask="99/99/9999" name="start_date" placeholder="" label="Vigência Início" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" mask="99/99/9999" name="end_date" placeholder="" label="Vigência Fim" value="" />
                </x-form.form-row>
                <x-form.form-col class="gap-1">
                    <x-form.input-file class="my-2 mx-1 w-full" name="path" placeholder="" label="Contrato" value="" />
                </x-form.form-col>


            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.configuracao.gestao-contrato.include.script')
    @endpush
</x-app-layout>
