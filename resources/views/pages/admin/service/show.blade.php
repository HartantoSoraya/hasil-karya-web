<x-layouts.admin title="Detail Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Service</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Service</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Thumbnail</th>
                        <td>
                            <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->name }}" class="img-fluid" style="width: 100px; height: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $service->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $service->description }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $service->slug }}</td>
                    </tr>
                    <tr>
                        <th>Gambar Layanan</th>
                        <td class="d-flex flex-wrap">
                            @foreach ($service->images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->name }}" class="img-fluid m-2" style="width: 100px; height: 100px;">
                            @endforeach
                        </td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.service.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>