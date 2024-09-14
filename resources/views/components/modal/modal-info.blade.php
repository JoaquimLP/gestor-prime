{{-- <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"> --}}
<div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed hidden left-0 top-0 z-999999 flex h-full min-h-full w-full items-center justify-center bg-black/50 px-4 py-5">
    <div class="relative w-full max-w-2xl rounded-lg bg-white dark:bg-slate-700 text-center md:px-4 md:py-6">
        <div class="">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $title }}
                </h3>
                <x-button.btn-close-icon />
            </div>
            <!-- Modal body -->
            <div class="text-start py-3">
                <div class="dark:bg-slate-700">
                    <div class="px-2">
                        <h3 class="text-neutral-600 dark:text-neutral-100">Informações relacionado ao Medico</h3>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_nome}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>Nome</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_rg}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>RG</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_cpf}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>CPF</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_crm}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>CRM</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_rqe}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>RQE</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_cidade}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>Cidade</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_uf}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>Estado</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_endereco}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>Rua ou Endereço</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{medico_cep}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>CEP</strong></span>
                        <p class="font-medium mt-2"> <code class="text-fuchsia-500">{quebra_de_pagina}</code> <span class="text-neutral-600 dark:text-neutral-100">-> <strong>Mudar de pagina</strong></span>
                    </div>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <x-button.btn-close wire:click="close" />
            </div>
        </div>
    </div>
</div>



{{--

  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                  </p>
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                  </p>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                  <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
              </div>
          </div>
      </div>
  </div> --}}

