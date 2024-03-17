<x-layouts.admin title="Detail Web Configuration">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.web-configuration.index') }}">Web Configuration</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Web Configuration</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Web Configuration</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $webConfiguration->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $webConfiguration->slug }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.web-configuration.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>