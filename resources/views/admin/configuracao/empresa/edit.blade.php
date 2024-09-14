<x-app-layout>
    <x-layout.heading title="Adicionar Empresa" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('configuracao.empresa.update', $empresa->id)" :method="'PUT'" :btnCancelRoute="route('configuracao.empresa.index')">
                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full" name="razao_social" placeholder="" label="Razão Social" :value="$empresa->razao_social" />
                </x-form.form-col>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-2/3" name="nome" placeholder="" label="Nome Fantasia" :value="$empresa->nome" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="99.999.999/9999-99" name="cnpj" placeholder="" label="CNPJ" :value="$empresa->cnpj" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="(99) 9 9999-9999" name="celular" placeholder="" label="Celular" :value="$empresa->celular" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="email" placeholder="" label="E-mail" :value="$empresa->email" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="999999999999999" name="ie" placeholder="" label="Inscrição Estadual" :value="$empresa->ie" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" mask="99999-999" name="cep" placeholder="" label="CEP" :value="$empresa->cep" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="uf" placeholder="SP" label="UF" :value="$empresa->uf" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="cidade_desc" placeholder="" label="Cidade" :value="$empresa->cidade_desc" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/4" name="bairro_desc" placeholder="" label="Bairro" :value="$empresa->bairro_desc" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 w-full lg:w-2/3" id="logradouro" name="logradouro" placeholder="" label="Endereço" :value="$empresa->logradouro" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/5" name="numero" placeholder="" label="Numero" :value="$empresa->numero" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="complemento" placeholder="" label="Complemento" :value="$empresa->complemento" />
                </x-form.form-row>
                <x-form.form-col class="gap-1">
                    <x-form.input-file class="my-2 mx-1 w-full" name="logo" placeholder="" label="Logo" value="" accept=".png, .jpg, .jpeg" />
                </x-form.form-col>
            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.configuracao.empresa.include.script')
    @endpush
</x-app-layout>
{{--  --}}
