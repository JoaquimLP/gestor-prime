<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
        <div class="p-6.5">

            @method("$method")
            @csrf

            {{ $slot }}

            <div class="mb-4.5 flex flex-row">
                <div class="mr-2">
                    <a href="{{ $btnCancelRoute ?? "#" }}" class="btn-cancel">Voltar</a>
                </div>
                <div class="ml-2">
                    <button type="submit" class="btn-save">
                        Salvar
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
