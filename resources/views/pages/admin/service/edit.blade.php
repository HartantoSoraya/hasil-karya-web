<x-layouts.admin title="Edit Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Service</h6>
                </x-slot>
                <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-forms.input type="file" label="Thumbnail" name="thumbnail" id="thumbnail" />
                    <x-forms.input label="Nama" name="name" id="name" :value="$service->name" />
                    <x-forms.textarea label="Description" name="description" id="description" :value="$service->description"/>
                    <x-forms.input label="Slug" name="slug" id="slug" :value="$service->slug" />
                    
                    <div class="mb-3">
                        <label for="selectedImages" class="form-label">Selected Images</label>
                        <div class="row">
                            @foreach($service->images as $image)
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->name }}" class="img-fluid mb-2">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <x-forms.input label="Gambar Layanan" name="images[]" id="images" type="file" multiple />

                    <x-ui.base-button color="danger" href="{{ route('admin.service.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Service
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