<x-layouts.admin title="Edit Frequently Asked Question">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.frequently-asked-question.index') }}">Frequently Asked Question</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Frequently Asked Question</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Frequently Asked Question</h6>
                </x-slot>
                <form action="{{ route('admin.frequently-asked-question.update', $frequentlyAskedQuestion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Question" name="question" id="question" :value="$frequentlyAskedQuestion->question" />
                    <x-forms.textarea label="Answer" name="answer" id="answer" :value="$frequentlyAskedQuestion->answer" />

                    <x-ui.base-button color="danger" href="{{ route('admin.frequently-asked-question.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Frequently Asked Question
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

@push('custom-scripts')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('keyup', function() {
            const nameValue = name.value;
            slug.value = nameValue.toLowerCase().split(' ').join('-');
        });
    </script>
@endpush  
</x-layouts.admin>