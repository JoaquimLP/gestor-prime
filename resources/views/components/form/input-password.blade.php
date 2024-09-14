@props([
    'wireInput',
])

<div {{ $attributes }}>
    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>
    <input type="password" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name ?? "") }}" {{ $wireInput }} class="input-text" autocomplete="new-password">

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
