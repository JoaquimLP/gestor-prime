<!-- Create the editor container -->
@push('customer-scripts')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endpush
{{-- hasButton --}}
<div class="group flex">
    <label class="mb-3 mr-2 block text-sm font-medium text-black dark:text-white">
        {{ $label }}
    </label>
    <a href="#" class="dark:text-white" data-modal-target="default-modal" data-modal-toggle="default-modal" > <x-icons.info /></a>
</div>
<div id="editor">
    {!! old($name, $value ?? "") !!}
</div>
<input type="hidden" name="{{ $name }}" value="{{ old($name, $value ?? "") }}" id="_{{ $name }}">

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <script>
        var tool = [[{ 'header': '1' }, { 'header': '2' }], [{ size: ['small', false, 'large', 'huge'] }], ['bold', 'italic', 'underline', 'strike'], [{ 'color': [] }, { 'background': [] }, { 'font': [] }, { 'align': [] }], ['image',]];
        const quill = new Quill('#editor', {
            theme: 'snow',
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            const text = quill.getSemanticHTML();

            $("#_{!! $name !!}").val(text);
        });
    </script>
@endpush
