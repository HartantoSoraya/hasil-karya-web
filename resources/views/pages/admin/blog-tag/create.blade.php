<x-layouts.admin title="Tambah Blog Tag">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog-tag.index') }}">Blog Tag</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Blog Tag</li>
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
                    <h6 class="card-title">Tambah Blog Tag</h6>
                </x-slot>
                <form action="{{ route('admin.blog-tag.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf
                    <x-forms.input label="Nama" name="name" id="name" /> 
                    <x-forms.input label="Slug" name="slug" id="slug" />    

                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.blog-tag.index') }}">
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