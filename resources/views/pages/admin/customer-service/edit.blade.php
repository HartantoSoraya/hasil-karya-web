<x-layouts.admin title="Edit Customer Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.customer-service.index') }}">Customer Service</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Customer Service</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Customer Service</h6>
                </x-slot>
                <form action="{{ route('admin.customer-service.update', $customerService->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Nama Divisi" name="title" id="title" :value="$customerService->title" />
                    <x-forms.input label="Email" name="email" id="email" :value="$customerService->email" />

                    <x-ui.base-button color="danger" href="{{ route('admin.customer-service.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Customer Service
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
