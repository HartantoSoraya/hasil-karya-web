<x-layouts.admin title="Client">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Client</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.client.create') }}">
                        Tambah Client
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($clients as $client)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $client->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" style="max-width: 100px; max-height: 100px;">
                            </td>

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.client.show', $client->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.client.edit', $client->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.client.destroy', $client->id) }}" method="POST" class="d-inline">
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
