<x-layouts.admin title="Contact">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Contact</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.contact.create') }}">
                        Tambah Contact
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Nama Perusahaan</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">                  
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->full_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ $contact->company_name }}</td>
                                <td>{{ $contact->message }}</td>

                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.contact.show', $contact->id) }}">
                                        Detail
                                    </x-ui.base-button>

                                    <x-ui.base-button color="warning" type="button"
                                        href="{{ route('admin.contact.edit', $contact->id) }}">
                                        Edit
                                    </x-ui.base-button>

                                    <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
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
