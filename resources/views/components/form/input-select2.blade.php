
<div {{ $attributes }}>
    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
        {{ $label ?? "teste" }}
    </label>
    @php
        $itens = old($name, !empty($value) ? $value : []) ;
    @endphp
    <select name="{{ $name }}" id="{{ $id }}" class="js-example-basic-single" style="width: 100%" multiple>
        <option value="" class="text-body">-----</option>
        @foreach ($collection as $item)
            <option value="{{ $item[$itemId] }}" @if (count($itens) > 0 && in_array($item[$itemId], $itens)) selected @endif class="text-body">{{ $item[$itemName] }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
