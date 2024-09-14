<x-app-layout>
    <x-layout.heading title="Adicionar Especialidade" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.especialidade.store')" :method="'POST'" :btnCancelRoute="route('cadastro.especialidade.index')">
                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 w-full" name="nome" placeholder="Teste" label="Nome"
                        value="" />
                    <x-form.input-text class="my-2 w-full" name="descricao" placeholder="" label="Descrição" />
                </x-form.form-col>
            </x-form.form-layout>
        </div>
    </div>
</x-app-layout>
