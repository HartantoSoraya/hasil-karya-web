<x-layouts.admin title="Detail Blog">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Blog</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Blog</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $blog->title }}</td>
                    </tr>
                    <tr>
                        <th>Thumbnail</th>
                        <td>
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                                style="height: 100px;width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <th>Content</th>
                        <td style="white-space: pre-line;">
                            {!! $blog->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $blog->slug }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>
                            @foreach ($blog->categories as $category)
                                <span class="badge bg-primary">{{ $category->name }}</span><br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Tagar</th>
                        <td>
                            @foreach ($blog->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span><br>
                            @endforeach
                        </td>
                    </tr>

                    <x-slot name="footer">
                        <x-ui.base-button color="danger"
                            href="{{ route('admin.blog.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
