<x-app-layout>
    <x-layout.heading :title="'Adicionar Dados Bancarios do (a) Dr. ' . $medico->nome" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.medico.dados-bancario.store', $medico->id)" :method="'POST'" :btnCancelRoute="route('cadastro.medico.dados-bancario.index', $medico->id)">
                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full" name="nome" placeholder="Banco do Bransil" label="Banco" value="" />
                </x-form.form-col>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="tipo_conta" placeholder="" label="Tipo da Conta" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="agencia" placeholder="" label="Digite a agência" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="conta" placeholder="" label="Digite a conta (com dígito)" value="" />
                </x-form.form-row class="gap-1">
                <x-form.form-row >
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/2" name="pix" placeholder="" label="Chave do Pix" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="cpf" placeholder="" label="CPF" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="rg" placeholder="" label="RG" value="" />
                </x-form.form-row>
            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.cadastro.medico.documento.include.script')
    @endpush
</x-app-layout>
