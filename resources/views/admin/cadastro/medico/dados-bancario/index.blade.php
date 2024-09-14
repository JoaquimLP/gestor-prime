<x-app-layout>
    <x-layout.heading :title="'Dados Bancarios do (a) Dr. ' . $medico->nome" :route="route('cadastro.medico.dados-bancario.create', $medico->id)" btn-label="Add Dados Bancarios" />

    <!-- ====== Table Section Start -->
    <div class="mx-auto p-4 md:p-6 2xl:p-10">

        <x-table.table-component :resource="$dadosBancarios" :delete="route('cadastro.medico.dados-bancario.destroy', $medico->id)" :columns="[
            ['label' => 'Banco', 'column' => 'nome', 'upload' => false],
            ['label' => 'Tipo da Conta', 'column' => 'tipo_conta', 'upload' => false],
            ['label' => 'Agência', 'column' => 'agencia', 'upload' => false],
            ['label' => 'Conta', 'column' => 'conta', 'upload' => false],
            ['label' => 'Pix', 'column' => 'pix', 'upload' => false],
            ['label' => 'CPF', 'column' => 'cpf', 'upload' => false],
            ['label' => 'RG', 'column' => 'rg', 'upload' => false],
        ]" />

        <div class="mb-4.5 mt-4 flex flex-row">
            <div class="mr-2">
                <a href="{{ route('cadastro.medico.index') }}"
                    class="flex w-28 rounded-full justify-center bg-slate-600 py-3 font-medium text-white hover:bg-opacity-90">Voltar</a>
            </div>
        </div>
    </div>

</x-app-layout>
