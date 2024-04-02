<x-layouts.admin title="Edit Testimonial">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">Testimonial</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Testimonial</h6>
                </x-slot>
                <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-forms.input label="Nama" name="name" id="name" :value="$testimonial->name" />
                    <x-forms.input label="Judul" name="title" id="title" :value="$testimonial->title" />
                    <x-forms.input label="Sub Judul" name="subtitle" id="subtitle" :value="$testimonial->subtitle" />

                    <x-ui.base-button color="danger" href="{{ route('admin.testimonial.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Testimonial
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
