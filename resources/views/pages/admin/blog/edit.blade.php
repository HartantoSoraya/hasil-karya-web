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
                    <x-forms.mde label="Content" name="content" id="content" :value="$blog->content" />
                    <x-forms.input label="Slug" name="slug" id="slug" :value="$blog->slug" />

                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori</label>
                        <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $blog->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tagar</label>
                        <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    @endpush
</x-layouts.admin>
