<x-layouts.admin title="Detail Blog Tag">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog-tag.index') }}">Blog Tag</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Blog Tag</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Detail Blog Tag</h6>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $blogTag->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $blogTag->slug }}</td>
                    </tr>
                </table>
                <x-slot name="footer">
                    <x-ui.base-button color="danger" href="{{ route('admin.blog-tag.index') }}">Kembali</x-ui.base-button>
                </x-slot>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>