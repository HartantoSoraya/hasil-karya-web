<x-layouts.admin title="Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Service</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.service.create') }}">
                        Tambah Service
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Thumbnail</th>
                            <th>Nama</th>
                            <th>Description</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->name }}" class="img-fluid" style="max-width: 100px">
                            </td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.service.show', $service->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.service.edit', $service->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" class="d-inline">
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
