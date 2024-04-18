<x-layouts.admin title="Edit Project">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.project.index') }}">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
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
                    <h6>Edit Project</h6>
                </x-slot>
                <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->thumbnail }}" class="img-fluid m-2" style="max-width: 200px;">
                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />
                    <x-forms.input label="Nama" name="name" id="name" value="{{ $project->name }}" />
                    <x-forms.input label="Slug" name="slug" id="slug" value="{{ $project->slug }}" />
                    <x-forms.textarea label="Deskripsi" name="description" id="description" value="{{ $project->description }}" />
                    <x-forms.input label="Client" name="client" id="client" value="{{ $project->client }}" />
                    <x-forms.input label="Tanggal Mulai" name="start_date" id="start_date" type="date" value="{{ date('Y-m-d', strtotime($project->start_date)) }}" />
                    <x-forms.input label="Tanggal Selesai" name="end_date" id="end_date" type="date" value="{{ $project->end_date ? date('Y-m-d', strtotime($project->end_date)) : null }}" nullable />

                    <div class="mb-3">
                        <label for="selectedImages" class="form-label">Selected Images</label>
                        <div class="row">
                            @foreach($project->images as $image)
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->name }}" class="img-fluid mb-2">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <x-forms.input label="Project Images" name="images[]" id="images" type="file" multiple />

                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori</label>
                        <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $project->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <x-ui.base-button color="danger" href="{{ route('admin.project.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Project
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
