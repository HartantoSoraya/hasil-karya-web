<x-layouts.admin title="Detail Customer Service">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.customer-service.index') }}">Customer Service</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Customer Service</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Customer Service</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $customerService->title }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $customerService->email }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.customer-service.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
