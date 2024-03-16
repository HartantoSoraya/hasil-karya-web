@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'label' => '',
    'placeholder' => '',
    'value' => '',
    'customClass' => '',
    'mb' => '3',
])

<div class="mb-{{ $mb }}">
    @if ($label)
        <label  class="form-label">{{ $label }}</label>
    @endif

    <textarea id="myeditorinstance">
        Hello, World!
    </textarea>
</div>


@push('head-scripts')
    <script src="https://cdn.tiny.cloud/1/5nrngs45c667kkrnpia9wu199xapyobjaon2dkct8rws8apa/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endpush
