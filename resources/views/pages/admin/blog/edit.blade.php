<x-layouts.admin title="Edit Blog">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Blog</h6>
                </x-slot>
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Title" name="title" id="title" :value="$blog->title" />
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" style="height: 100px;width: 100px;">
                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />                                            
                    <x-forms.textarea label="Content" name="content" id="content" :value="$blog->content" />
                    <x-forms.input label="Slug" name="slug" id="slug" :value="$blog->slug" />
                    <x-ui.base-button color="danger" href="{{ route('admin.blog.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Blog
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

@push('custom-scripts')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {
            const titleValue = title.value;
            slug.value = titleValue.toLowerCase().split(' ').join('-');
        });
    </script>
@endpush  
</x-layouts.admin>