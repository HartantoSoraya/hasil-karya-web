<x-layouts.admin title="Edit Client">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Client</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Client</h6>
                </x-slot>
                <form action="{{ route('admin.client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Nama" name="name" id="name" :value="$client->name" />
                    <x-forms.input label="Slug" name="slug" id="slug" :value="$client->slug" />

                    <x-ui.base-button color="danger" href="{{ route('admin.client.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Client
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