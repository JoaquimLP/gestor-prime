<x-app-layout>
    <x-layout.heading title="Adicionar Usuário" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('configuracao.usuario.update', $user->id)" :method="'PUT'" :btnCancelRoute="route('configuracao.usuario.index')">

                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full" name="name" placeholder="" label="Nome" :value="$user->name" />
                </x-form.form-col>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="(99) 9 9999-9999" name="celular" placeholder="" label="Celular" :value="$user->celular" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="email" placeholder="" label="E-mail" :value="$user->email" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="99/99/9999" name="data_nascimento" placeholder="" label="Data de Nascimento" :value="$user->data_nascimento" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-password class="my-2 mx-1 w-full lg:w-1/3" name="password" placeholder="" label="Senha" />
                    <x-form.input-password class="my-2 mx-1 w-full lg:w-1/3" name="password_confirmation" placeholder="" label="Confirmar Senha" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-select2 class="my-2 mx-1 w-full lg:w-1/2" :collection="$empresas" itemId="id" itemName="nome" name="empresa_id[]" :label="'Empresa'" :value="$user->empresas->pluck('id')->toArray()" />
                </x-form.form-row>
            </x-form.form-layout>
        </div>
    </div>
    @push('scripts')
        @include('admin.configuracao.usuario.include.script')
    @endpush
</x-app-layout>
{{--  --}}
