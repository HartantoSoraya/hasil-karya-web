<x-layouts.admin title="Blog">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Blog</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.blog.create') }}">
                        Tambah Blog
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Content</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" width="100">
                            </td>
                            <td>{{ $blog->content }}</td>                                

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.blog.show', $blog->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.blog.edit', $blog->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="d-inline">
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