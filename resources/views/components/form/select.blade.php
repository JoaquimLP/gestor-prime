<div {{ $attributes }}>
    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>
    <select name="{{ $name }}" id="{{ $id }}"
        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
        <option value="" class="text-body">-----</option>
        @foreach ($collection as $item)
            <option value="{{ $item[$itemId] }}" @if (old($name, $value ?? "") == $item[$itemId]) selected @endif class="text-body">
                {{ $item[$itemName] }} @if (!empty($nameSecondary)) | {{ $item[$nameSecondary] }} @endif
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
