<x-layouts.admin title="Edit Contact">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Contact</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Contact</h6>
                </x-slot>
                <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Full Name" name="full_name" id="full_name" :value="$contact->full_name" />
                    <x-forms.input label="Email" name="email" id="email" :value="$contact->email" />
                    <x-forms.input label="Phone Number" name="phone_number" id="phone_number" :value="$contact->phone_number" />
                    <x-forms.input label="Company Name" name="company_name" id="company_name" :value="$contact->company_name" />
                    <x-forms.input label="Message" name="message" id="message" :value="$contact->message" />
                    <x-forms.select label="Customer Service" name="customer_service_id" id="customer_service_id" :options="$customerServices" key="id" value="title" :selected="$contact->customer_service_id" />

                    <x-ui.base-button color="danger" href="{{ route('admin.contact.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Contact
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
