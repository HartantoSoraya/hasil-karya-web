<x-layouts.app title="Kontak Kami">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>Kontak Kami</h3>
            <div class="breadcumb">
                <a href="#">Home</a>
                <span class="sep">-</span>
                <span class="page-name">Kontak Kami</span>
            </div>
        </div>
    </section>

    <section class="contact-page-content sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Mohon lengkapi semua form yang ada
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <form action="{{ route('app.contact.store') }}" class="contact-form row" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <p>Nama Lengkap</p>
                            <input type="text" name="full_name" />
                        </div>
                        <div class="col-md-6">
                            <p>Email</p>
                            <input type="text" name="email" />
                        </div>
                        <div class="col-md-6">
                            <p>Nomer Hp</p>
                            <input type="text" name="phone_number" />
                        </div>
                        <div class="col-md-6">
                            <p>Nama Perusahaan</p>
                            <input type="text" name="company_name" />
                        </div>
                        <div class="col-md-12">
                            <p>Pilih divisi yang ingin dihubungi</p>
                            <select name="customer_service_id">
                                <option value="">Pilih Divisi</option>
                                @foreach ($customerServices as $customerService)
                                    <option value="{{ $customerService->id }}">{{ $customerService->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <p>Pesan</p>
                            <textarea name="message"></textarea>
                            <button type="submit">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Hubungi Kami</h3>
                        <p>Untuk pertanyaan apa pun, hubungi kami dengan <br /> detail di bawah.</p>
                        <div class="single-contact-info">
                            <i class="zxp-icon-old-telephone-ringing"></i>
                            <p>+123 (569) 254 78</p>
                        </div>
                        <div class="single-contact-info">
                            <i class="fas fa-envelope-open"></i>
                            <p>info-desk@zxp.com</p>
                        </div>
                        <div class="single-contact-info">
                            <i class="fas fa-home"></i>
                            <p>#59, East Madison Ave, <br /> Melbourne, Australia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('submit', function (e) {
                if (e.target.tagName.toLowerCase() === 'form') {
                    e.target.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
                    e.target.querySelector('button[type="submit"]').innerHTML = 'Mengirim...';
                }
            });
        </script>
    @endpush
</x-layouts.app>
