<header class="header header-home-two">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="container clearfix">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed zxp-icon-menu" data-toggle="collapse"
                    data-target=".main-navigation" aria-expanded="false"> </button>
                <a class="navbar-brand" href="{{ route('app.landing') }}">
                    <img src="{{ asset('app/fonts/logo-hk.png') }}" alt="Awesome Image" width="150">
                </a>
            </div>

            <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">
                <ul class="nav navbar-nav navigation-box">
                    <li class="{{ request()->routeIs('app.landing') ? 'current' : '' }}">
                        <a href="{{ route('app.landing') }}">Home</a>
                    </li>
                    <li class="{{ request()->routeIs('app.services') ? 'current' : '' }}">
                        <a href="{{ route('app.services') }}">Layanan</a>
                        <ul class="sub-menu">
                            @foreach (\App\Models\Service::all() as $service)
                                <li>
                                    <a href="{{ route('app.service', $service->slug) }}">{{ $service->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('app.projects') ? 'current' : '' }}">
                        <a href="{{ route('app.projects') }}">Proyek Kami</a>
                    </li>
                    <li class="{{ request()->routeIs('app.galleries') ? 'current' : '' }}">
                        <a href="{{ route('app.galleries') }}">Galeri Kami</a>
                    </li>
                    <li class="{{ request()->routeIs('app.blogs') ? 'current' : '' }}">
                        <a href="{{ route('app.blogs') }}">Blog</a>
                    </li>
                    <li class="{{ request()->routeIs('app.about') ? 'current' : '' }}">
                        <a href="{{ route('app.about') }}">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="#">Masuk</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('login')}}">Web</a>
                            </li>
                            <li>
                                <a href="https://system.hasilkarya.co.id/auth/login">Sistem Manajemen Proyek (SiMonro)</a>
                            </li>
                            <li>
                                <a href="https://ews.hasilkarya.co.id/auth/login">Early Warning Sistem (EWS)</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-side-box">
                <a href="{{ route('app.contact') }}" class="rqa-btn">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </nav>
</header>
