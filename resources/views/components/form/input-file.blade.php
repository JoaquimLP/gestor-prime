@props([
    'wireInput',
])

<div {{ $attributes }}>
    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>

    <input class="input-file" id="file_input" type="file" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value ?? "") }}" {{ $wireInput }} class="input-file" accept="{{ $accept ?? 'application/pdf' }}">

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
