<div class="flex items-center mb-4">
    <input id="{{ $name }}_{{ $key }}" type="radio" value="{{ $value }}" name="{{ $name }}" class="input-radio" {{$isChecked}}>
    <label for="{{ $name }}_{{ $key }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
</div>
