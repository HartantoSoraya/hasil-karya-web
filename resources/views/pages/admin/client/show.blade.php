<x-layouts.admin title="Detail Client">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Client</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Client</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Client</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $client->name }}</td>
                    </tr>
                    <tr>
                        <th>Logo</th>
                        <td>
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" style="max-width: 200px;">
                        </td>
                    </tr>
                    <tr>
                        <th>Url</th>
                        <td>{{ $client->url }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.client.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
