<x-layouts.admin title="Edit Web Configuration">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.web-configuration.index') }}">Web Configuration</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Web Configuration</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Web Configuration</h6>
                </x-slot>
                <form action="{{ route('admin.web-configuration.update', $webConfiguration->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Nama" name="name" id="name" :value="$webConfiguration->name" />
                    <x-forms.input label="Slug" name="slug" id="slug" :value="$webConfiguration->slug" />

                    <x-ui.base-button color="danger" href="{{ route('admin.web-configuration.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Web Configuration
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