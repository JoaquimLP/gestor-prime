@push('customer-scripts')
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
@endpush
<div class="max-w-full overflow-x-auto">
    <div class="min-w-[770px]">
        <div class="flex flex-col">
            <div class="bg-white relative sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto  dark:bg-boxdark-2">
                    <table {{ $attributes }} >
                        {{ $slot }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

