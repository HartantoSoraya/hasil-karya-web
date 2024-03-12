<x-layouts.admin title="Detail Banner">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Banner</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Banner</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Gambar</th>
                        <td>
                            <img src="{{ asset($banner->image_url) }}" alt="{{ $banner->title }}" style="height: 100px;width: 100px;">
                        </td>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $banner->title }}</td>
                    </tr>
                    <tr>
                        <th>Sub Judul</th>
                        <td>{{ $banner->subtitle }}</td>
                    </tr>
                    <tr>
                        <th>Link Url</th>
                        <td>{{ $banner->url }}</td>
                    </tr>
                    <tr>
                        <th>Text Url</th>
                        <td>{{ $banner->text_url }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.banner.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>