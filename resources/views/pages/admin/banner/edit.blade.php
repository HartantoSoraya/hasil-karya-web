<x-layouts.admin title="Edit Banner">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Banner</h6>
                </x-slot>
                <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <img src="{{ asset($banner->image_url) }}" alt="{{ $banner->title }}" style="width: 400px; max-height: 400px;">
                    <x-forms.input label="Gambar" name="image" id="image" type="file" />
                    <x-forms.input label="Judul" name="title" id="title" :value="$banner->title" />
                    <x-forms.input label="Sub Judul" name="subtitle" id="subtitle" :value="$banner->subtitle" />
                    <x-forms.input label="Link Url" name="url" id="url" :value="$banner->url" />
                    <x-forms.input label="Text Url" name="text_url" id="text_url" :value="$banner->text_url" />

                    <x-ui.base-button color="danger" href="{{ route('admin.banner.index') }}">
                        Kembali
                    </x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">
                        Update Banner
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
