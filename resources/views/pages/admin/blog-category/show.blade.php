<x-layouts.admin title="Detail Blog Category">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog-category.index') }}">Blog Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Blog Category</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Blog Category</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $blogCategory->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $blogCategory->slug }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.blog-category.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>