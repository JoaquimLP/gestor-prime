@if (isset($showItem))

    <div class="max-w-xl bg-white dark:bg-gray-800 dark:border-gray-700">
        <div class="px-50">
            <img class="rounded-t-lg" src="{{ isset($showItem->logo) ? temporary_url_foto($showItem->logo) : "" }}" alt="" />
        </div>
        <div class="p-5">
            <p class="font-medium mt-2"> <span class="text-boxdark-2">Razão Social:</span> <strong>{{ $showItem->razao_social ?? "" }}</strong></p>
            <p class="font-medium mt-2"> <span class="text-boxdark-2">Nome Fantasia:</span> <strong>{{ $showItem->nome ?? "" }}</strong></p>
            <p class="font-medium mt-2"> <span class="text-boxdark-2">CNPJ:</span> <strong>{{ $showItem->cnpj ? mask_cnpj($showItem->cnpj) : "" }}</strong></p>
            <p class="font-medium mt-2"> <span class="text-boxdark-2">Celular:</span> <strong>{{ $showItem->celular ? mask_celular($showItem->celular) : "" }}</strong></p>
            <p class="font-medium mt-2"> <span class="text-boxdark-2">Email:</span> <strong>{{ $showItem->email ?? "" }}</strong></p>
            <p class="font-medium mt-2"> <span class="text-neutral-600 dark:text-neutral-100">Endereco:</span> <br> <strong>{{ isset($showItem) ? getEndereco($showItem) : "" }}</strong></p>
        </div>
    </div>

@endif


