<x-app-layout>
    <x-layout.heading title="Adicionar Medico" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.medico.store')" :method="'POST'" :btnCancelRoute="route('cadastro.medico.index')">
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-2/2" name="nome" placeholder="João" label="Nome" value="" :wireInput="'wire:model=teste'" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-1/3" :collection="$empresas" itemId="id" itemName="nome" name="empresa_id" :label="'Empresa'" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" mask="(99) 9 9999-9999" name="celular" placeholder="(00) 0 0000-0000" label="Celular" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" name="email" placeholder="joao@email.com" label="E-mail" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="crm" placeholder="" label="CRM" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="rqe" placeholder="" label="RQE" value="" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-1/3" :collection="$estadoCivil" itemId="id" itemName="name" name="estado_civil" :label="'Estadado Civil'" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" mask="999.999.999-99" name="cpf" placeholder="999.999.999-99" label="CPF" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" mask="99.999.999-99" name="rg" placeholder="99.999.999-9" label="RG" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-radion-group label="Funcionário Público:" name="func_public" :field="[['label' => 'Sim', 'value' => 1], ['label' => 'Não', 'value' => 0]]" />
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
        @include('admin.cadastro.medico.include.script')
    @endpush
</x-app-layout>
