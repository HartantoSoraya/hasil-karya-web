<x-layouts.admin title="Tambah Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Service</li>
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
                    <h4 class="card-title">Tambah Service</h4>
                </x-slot>
                <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input type="file" label="Thumbnail" name="thumbnail" id="thumbnail" />
                    <x-forms.input label="Nama" name="name" id="name" />                    
                    <x-forms.textarea label="Description" name="description" id="description" />
                    <x-forms.input label="Slug" name="slug" id="slug" />
                    <x-forms.input label="Gambar Proyek" name="images[]" id="images" type="file" multiple />                    
                        
                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.service.index') }}">
                        Kembali
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