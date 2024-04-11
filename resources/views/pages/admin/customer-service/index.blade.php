<x-layouts.admin title="Customer Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Customer Service</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.customer-service.create') }}">
                        Tambah Customer Service
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama Divisi</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($customerServices as $customerService)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customerService->title }}</td>
                                <td>{{ $customerService->email }}</td>
                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.customer-service.show', $customerService->id) }}">
                                        Detail
                                    </x-ui.base-button>

                                    <x-ui.base-button color="warning" type="button"
                                        href="{{ route('admin.customer-service.edit', $customerService->id) }}">
                                        Edit
                                    </x-ui.base-button>

                                    <form action="{{ route('admin.customer-service.destroy', $customerService->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-ui.base-button color="danger" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus?')">
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
