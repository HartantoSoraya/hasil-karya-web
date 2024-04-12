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
                    @if ($client->logo)
                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="img-fluid m-2" style="max-width: 100px; max-height: 100px;">
                    @endif
                    <x-forms.input label="Logo" name="logo" type="file" />
                    <x-forms.input label="Url" name="url" id="url" :value="$client->url" />

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
</x-layouts.admin>
