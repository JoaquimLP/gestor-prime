<x-app-layout>
    <x-layout.heading title="Atualizar U.A" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.medico.update', $unidadeAtendimento->id)" :method="'PUT'" :btnCancelRoute="route('cadastro.medico.index')">
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 w-full" name="nome" placeholder="Teste" label="Nome" :value="$unidadeAtendimento->nome" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-2/3" :collection="$contratos" itemId="id" itemName="contratada" :nameSecondary="'cidade_desc'" name="contrato_id" :label="'Contrato'"
                        :value="$unidadeAtendimento->gestaoContrato->first()->id ?? ''" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" mask="99999-999" name="cep" placeholder="00000-000" label="CEP" :value="$unidadeAtendimento->cep" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="uf" placeholder="SP" label="UF" :value="$unidadeAtendimento->uf" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="cidade_desc" placeholder="São Paulo" label="Cidade" :value="$unidadeAtendimento->cidade_desc" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="bairro_desc" placeholder="Teste" label="Bairro" :value="$unidadeAtendimento->bairro_desc" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 w-full lg:w-2/3" id="logradouro" name="logradouro" placeholder="" label="Endereço" :value="$unidadeAtendimento->logradouro" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/5" name="numero" placeholder="00" label="Numero" :value="$unidadeAtendimento->numero" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="complemento" placeholder="Teste" label="Complemento" :value="$unidadeAtendimento->complemento" />
                </x-form.form-row>
            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.cadastro.medico.include.script')
    @endpush
</x-app-layout>
