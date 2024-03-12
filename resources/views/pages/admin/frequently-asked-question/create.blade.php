<x-layouts.admin title="Tambah Frequently Asked Question">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.frequently-asked-question.index') }}">Frequently Asked Question</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Frequently Asked Question</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        @if ($errors->any())
        <div class="col-md-12 grid-margin">
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Tambah Frequently Asked Question</h4>
                </x-slot>
                <form action="{{ route('admin.frequently-asked-question.store') }}" method="POST">
                    @csrf
                    <x-forms.input label="Question" name="question" id="question" />
                    <x-forms.textarea label="Answer" name="answer" id="answer" />   
                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.frequently-asked-question.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>