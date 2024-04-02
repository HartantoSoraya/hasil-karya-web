<header class="header header-home-two">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="container clearfix">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed zxp-icon-menu" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false"> </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('app/fonts/logo-hk.png') }}" alt="Awesome Image" width="150">
                </a>
            </div>

            <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">

                <ul class="nav navbar-nav navigation-box">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li> <a href="about.html">Tentang Kami</a> </li>
                    <li>
                        <a href="{{ route('app.services') }}">Layanan</a>
                        <ul class="sub-menu">
                            @foreach (\App\Models\Service::all() as $service)
                                <li>
                                    <a href="{{ route('app.service', $service->slug) }}">{{ $service->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-side-box">
                <a href="#" class="rqa-btn">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </nav>
</header>
