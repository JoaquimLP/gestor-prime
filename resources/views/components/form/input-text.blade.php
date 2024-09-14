@props([
    'wireInput',
])

<div {{ $attributes }}>
    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>
    <input type="text" @if (isset($mask)) x-mask="{{ $mask }}" @endif placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value ?? "") }}" {{ $wireInput }}
        class="input-text">

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
