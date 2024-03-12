<x-layouts.admin title="Tambah Banner">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.banner.index') }}">Banner</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Banner</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Tambah Banner</h6>
                </x-slot>
                <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf
                    <x-forms.input label="Gambar" name="image" id="image" type="file" />
                    <x-forms.input label="Judul" name="title" id="title" />
                    <x-forms.input label="Sub Judul" name="subtitle" id="subtitle" />
                    <x-forms.input label="Link Url" name="url" id="url" />
                    <x-forms.input label="Text Url" name="text_url" id="text_url" />

                    <x-ui.base-button color="danger" href="{{ route('admin.banner.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Tambah Banner
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>


</x-layouts.admin>
