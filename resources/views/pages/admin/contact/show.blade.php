<x-layouts.admin title="Detail Contact">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Contact</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Contact</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Contact</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>{{ $contact->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $contact->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Company Name</th>
                        <td>{{ $contact->company_name }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $contact->message }}</td>
                    </tr>
                    <tr>
                        <th>Customer Service</th>
                        <td>{{ $contact->customerService->title }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.contact.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
