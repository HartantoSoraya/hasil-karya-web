<x-layouts.admin title="Web Configuration">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Web Configuration</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.web-configuration.create') }}">
                        Tambah Web Configuration
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
                        @foreach ($webConfigurations as $webConfiguration)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $webConfiguration->name }}</td>

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.web-configuration.show', $webConfiguration->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.web-configuration.edit', $webConfiguration->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.web-configuration.destroy', $webConfiguration->id) }}" method="POST" class="d-inline">
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