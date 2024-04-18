<x-layouts.auth title="Masuk">
    <div class="page-content d-flex align-items-center justify-content-center"
        style="background-image: url('https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-036.jpg'); background-size: cover; background-position: center;">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-12 col-xl-4 mx-auto" style="background: rgb(255, 255, 255, 0.7); border: 2px solid #ffffff; border-radius: 12px;">
                <div class="row flex-column-reverse flex-md-row">
                    <div class="col-md-12">
                        <div class="auth-form-wrapper px-4 py-5">
                            <a href="#" class="noble-ui-logo d-block mb-2">
                                {{ config('app.name') }}
                            </a>
                            <h5 class="text-muted fw-normal mb-4">Silahkan Login Dengan Akun Anda</h5>
                            <form action="{{ route('login.store') }}" method="POST">
                                @csrf
                                <x-forms.input type="email" name="email" label="Email" placeholder="Masukkan email"
                                    required autofocus />
                                <x-forms.input type="password" name="password" label="Password"
                                    placeholder="Masukkan password" required />
                                <x-ui.base-button type="submit" class="w-100" color="primary">
                                    Masuk
                                </x-ui.base-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
