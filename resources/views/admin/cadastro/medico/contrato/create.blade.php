<x-app-layout>
    <x-layout.heading :title="'Criar Contrado do (a) Dr. ' . $medico->nome" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-9">
            <x-form.form-layout :route="route('cadastro.medico.contrato.store', $medico->id)" :method="'POST'" :btnCancelRoute="route('cadastro.medico.contrato.index', $medico->id)">
                <x-form.form-row class="gap-1">
                    <x-form.select class="my-2 mx-1 w-full lg:w-1/2" :collection="$especialidades" itemId="id" itemName="nome" name="especialidade_id" :label="'Especialidade'" value="" />
                    <x-form.select class="my-2 mx-1 w-full lg:w-1/2" :collection="$unidades" itemId="id" itemName="nome" name="unidade_atendimento_id" :label="'U.A'" value="" />
                </x-form.form-row>
                <x-form.form-row class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" mask="99/99/9999" name="start_date" placeholder="00/00/0000" label="Data de inicio do contrato" value="" />
                    <x-form.input-text class="my-2 mx-1 w-full lg:w-1/3" name="end_date" mask="99/99/9999" placeholder="00/00/0000" label="Data final do contrato" value="" />
                </x-form.form-row>
                <x-form.form-col class="gap-1">
                    <x-form.input-text class="my-2 mx-1 w-full" name="descricao" placeholder="" label="Descrição Interna" value="" />
                </x-form.form-col>
                <x-form.form-col class="gap-1">
                    <x-form.text-quill name="clausula_adicional" label="Cláusula Adicional" value="" />
                </x-form.form-row>
            </x-form.form-layout>
        </div>

    </div>
    @push('scripts')
        {{-- @include('admin.cadastro.medico.documento.include.script') --}}
    @endpush
</x-app-layout>
