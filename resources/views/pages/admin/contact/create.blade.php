<x-layouts.admin title="Tambah Contact">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Contact</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Contact</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        @if ($errors->any())
        <div class="col-md-12 grid-margin">
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Tambah Contact</h4>
                </x-slot>
                <form action="{{ route('admin.contact.store') }}" method="POST">
                    @csrf
                    <x-forms.input label="Full Nama" name="full_name" id="full_name" />
                    <x-forms.input label="Email" name="email" id="email" />
                    <x-forms.input label="Phone Number" name="phone_number" id="phone_number" />    
                    <x-forms.input label="Company Name" name="company_name" id="company_name" />    
                    <x-forms.input label="Message" name="message" id="message" />    
                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.contact.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('custom-scripts')
    <script>
        const full_name = document.querySelector('#full_name');
        const email = document.querySelector('#email');
        const phone_number = document.querySelector('#phone_number');
        const company_name = document.querySelector('#company_name');
        const message = document.querySelector('#message');

        name.addEventListener('keyup', function() {
            const nameValue = name.value;
            slug.value = nameValue.toLowerCase().split(' ').join('-');
        });
    </script>
    @endpush
</x-layouts.admin>