<x-layouts.admin title="Project">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Project</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.project.create') }}">
                        Tambah Project
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Thumbnail</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Client</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>    
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->name }}" class="img-fluid" style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->client }}</td>
                            <td>{{ $project->start_date->format('d-M-Y') }}</td>
                            <td>{{ $project->end_date ? $project->end_date->format('d-M-Y') : '' }}</td>                                                       
                            <td>
                                @foreach ($project->categories as $category)
                                <span class="badge bg-primary">{{ $category->name }}</span><br>
                                @endforeach
                            </td>

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.project.show', $project->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.project.edit', $project->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="d-inline">
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