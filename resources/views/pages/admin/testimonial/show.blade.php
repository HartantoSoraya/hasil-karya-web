<x-layouts.admin title="Detail Testimonial">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">Testimonial</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Testimonial</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Testimonial</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $testimonial->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $testimonial->slug }}</td>
                    </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.testimonial.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>