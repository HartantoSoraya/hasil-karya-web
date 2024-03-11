
<x-layouts.admin title="Blog Tag">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Blog Tag</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.blog-tag.create') }}">
                        Tambah Blog Tag
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($blogTags as $blogTag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blogTag->name }}</td>

                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.blog-tag.show', $blogTag->id) }}">
                                        Detail
                                    </x-ui.base-button>

                                    <x-ui.base-button color="warning" type="button"
                                        href="{{ route('admin.blog-tag.edit', $blogTag->id) }}">
                                        Edit
                                    </x-ui.base-button>

                                    <form action="{{ route('admin.blog-tag.destroy', $blogTag->id) }}" method="POST"
                                        class="d-inline">
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