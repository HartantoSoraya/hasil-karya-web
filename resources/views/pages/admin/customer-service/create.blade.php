<x-layouts.admin title="Tambah Customer Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.customer-service.index') }}">Customer Service</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Customer Service</li>
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
                    <h4 class="card-title">Tambah Customer Service</h4>
                </x-slot>
                <form action="{{ route('admin.customer-service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input label="Title" name="title" id="title" />
                    <x-forms.input label="Email" name="email" id="email" />
                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.customer-service.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
