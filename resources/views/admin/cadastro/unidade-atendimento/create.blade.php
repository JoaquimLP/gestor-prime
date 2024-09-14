<x-app-layout>
    <x-layout.heading title="Adicionar U.A" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.unidade-atendimento.store')" :method="'POST'" :btnCancelRoute="route('cadastro.unidade-atendimento.index')">
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 w-full lg:w-2/2" name="nome" placeholder="Teste" label="Nome" value="" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-2/3" :collection="$contratos" itemId="id" itemName="contratada" :nameSecondary="'cidade_desc'" name="contrato_id" :label="'Contrato'" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" mask="99999-999" name="cep" placeholder="00000-000" label="CEP" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="uf" placeholder="SP" label="UF" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="cidade_desc" placeholder="São Paulo" label="Cidade" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="bairro_desc" placeholder="Teste" label="Bairro" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 w-full lg:w-2/3" id="logradouro" name="logradouro" placeholder="" label="Endereço" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/5" name="numero" placeholder="00" label="Numero" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="complemento" placeholder="Teste" label="Complemento" value="" />
                </x-form.form-row>
            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.cadastro.unidade-atendimento.include.script')
    @endpush
</x-app-layout>
