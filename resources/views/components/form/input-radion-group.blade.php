<div class="px-2 py-2">
    <label for="roleSelect" class="mb-4.5 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>
    <div class="flex flex-wrap items-center gap-5.5">
        @foreach ($field as $key => $input)
            @php
                $isChecked = old($name, $value ?? "") == $input['value'] ? "checked" : "";
            @endphp
            <x-form.input-radion :label="$input['label']"  :value="$input['value']" :name="$name" :key="$key" :isChecked="$isChecked" />
        @endforeach
    </div>
</div>
