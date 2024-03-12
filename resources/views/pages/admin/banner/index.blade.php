<x-layouts.admin title="Banner">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Banner</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.banner.create') }}">
                        Tambah Banner
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>URL</th>
                            <th>Text URL</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset($banner->image_url) }}" alt="{{ $banner->title }}" style="height: 100px; width: 100px;">
                            </td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->subtitle }}</td>
                            <td>{{ $banner->url }}</td>
                            <td>{{ $banner->text_url }}</td>

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.banner.show', $banner->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.banner.edit', $banner->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-ui.base-button color="danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </x-ui.base-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </x-slot>
                </x-ui.datatables>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>                