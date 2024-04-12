<x-layouts.admin title="Tambah Client">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Client</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Client</li>
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
                    <h4 class="card-title">Tambah Client</h4>
                </x-slot>
                <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input label="Nama" name="name" id="name" />
                    <x-forms.input label="Logo" name="logo" type="file" />
                    <x-forms.input label="Url" name="url" id="url"/>

                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.client.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
