<x-layouts.admin title="Edit Project Category">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.project-category.index') }}">Project Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Project Category</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Project Category</h6>
                </x-slot>
                <form action="{{ route('admin.project-category.update', $projectCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Nama" name="name" id="name" :value="$projectCategory->name" />
                    <x-forms.input label="Slug" name="slug" id="slug" :value="$projectCategory->slug" />

                    <x-ui.base-button color="danger" href="{{ route('admin.project-category.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Project Category
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