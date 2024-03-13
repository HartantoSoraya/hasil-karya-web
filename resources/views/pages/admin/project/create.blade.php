<x-layouts.admin title="Tambah Project">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.project.index') }}">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Project</li>
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
                    <h4 class="card-title">Tambah Project</h4>
                </x-slot>
                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />
                    <x-forms.input label="Nama" name="name" id="name" />
                    <x-forms.input label="Slug" name="slug" id="slug" />
                    <x-forms.textarea label="Deskripsi" name="description" id="description" />                    
                    <x-forms.input label="Client" name="client" id="client" />
                    <x-forms.input label="Tanggal Mulai" name="start_date" id="start_date" type="date" value="{{ date('Y-m-d') }}" />
                    <x-forms.input label="Tanggal Selesai" name="end_date" id="end_date" type="date" value="{{ date('Y-m-d') }}" nullable />                    
                    <x-forms.input label="Gambar Proyek" name="images[]" id="images" type="file" multiple />                    

                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori</label>
                        <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.project.index') }}">
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    @endpush
</x-layouts.admin>