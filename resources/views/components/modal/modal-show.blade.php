<div>
    <div x-show="$wire.modalOpen" x-transition class="fixed left-0 top-0 z-999999 flex h-full min-h-full w-full items-center justify-center bg-black/50 px-4 py-5">
        <div @click.outside="$wire.dispatch('close')" class="relative w-full max-w-142.5 rounded-lg bg-white dark:bg-slate-700 text-center md:px-4 md:py-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $title }}
                </h3>
                <x-button.btn-close-icon />
            </div>
            <!-- Modal body -->
            <div class="text-start py-3">
                @include($include)
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <x-button.btn-close wire:click="close" />
            </div>
        </div>
    </div>
</div>

