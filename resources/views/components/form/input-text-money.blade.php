@props(['wireInput'])

<div {{ $attributes }}>
    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>
    <input type="text" x-mask:dynamic="creditCardMask" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value ?? '') }}" {{ $wireInput }} class="input-text">

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
@push('scripts')
    <script>
        function creditCardMask(input) {
            input = input.replace('.', '').replace(',', '').replace(/\D/g, '')

            const options = { minimumFractionDigits: 2 }
            const result = new Intl.NumberFormat('pt-BR', options).format(
                parseFloat(input) / 100
            )

            return result
        }


    </script>
@endpush
