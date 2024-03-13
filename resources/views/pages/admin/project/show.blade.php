<x-layouts.admin title="Detail Project">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.project.index') }}">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Project</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Project</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Thumbnail</th>
                        <td>
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->name }}" class="img-fluid" style="width: 100px; height: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $project->slug }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $project->description }}</td>
                    </tr>
                    <tr>
                        <th>Client</th>
                        <td>{{ $project->client }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>{{ $project->start_date->format('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <td>{{ $project->end_date->format('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Gambar Proyek</th>
                        <td class="d-flex flex-wrap">
                            @foreach ($project->images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->name }}" class="img-fluid m-2" style="width: 100px; height: 100px;">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>
                            @foreach ($project->categories as $category)
                            <span class="badge bg-primary">{{ $category->name }}</span><br>
                            @endforeach
                        </td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.project.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>