<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>
        {{ $title }}
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('app/fonts/logo-hk.png') }}" type="image/x-icon">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('app/css/style.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('app/css/responsive.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('app/css/custom.css?v=' . time()) }}">

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $title ?? 'CV. Hasil Karya' }}">
    <meta name="description" content="{{ $description ?? 'CV. Hasil Karya adalah perusahaan yang bergerak di bidang kontraktor bangunan, interior, dan furniture. Kami melayani jasa pembangunan rumah, kantor, ruko, dan lainnya.' }}">
    <meta name="keywords" content="{{ $keywords ?? 'CV. Hasil Karya, kontraktor bangunan, kontraktor interior, kontraktor furniture, jasa bangun rumah, jasa bangun kantor, jasa bangun ruko, kontraktor purwokerto, kontraktor banyumas, kontraktor cilacap' }}">
    <meta name="author" content="CV. Hasil Karya">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7 days">
    <meta name="publisher" content="CV. Hasil Karya">
    <meta name="copyright" content="CV. Hasil Karya">
    <meta name="distribution" content="Global">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'CV. Hasil Karya' }}">
    <meta property="og:description" content="{{ $description ?? 'CV. Hasil Karya adalah perusahaan yang bergerak di bidang kontraktor bangunan, interior, dan furniture. Kami melayani jasa pembangunan rumah, kantor, ruko, dan lainnya.' }}">
    <meta property="og:image" content="{{ $thumbnail ?? asset('app/fonts/logo-hk.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'CV. Hasil Karya' }}">
    <meta property="twitter:description" content="{{ $description ?? 'CV. Hasil Karya adalah perusahaan yang bergerak di bidang kontraktor bangunan, interior, dan furniture. Kami melayani jasa pembangunan rumah, kantor, ruko, dan lainnya.' }}">
    <meta property="twitter:image" content="{{ $thumbnail ?? asset('app/fonts/logo-hk.png') }}">



    @stack('styles')
</head>

<body>
    <x-ui.app-header />

    @include('sweetalert::alert')


    {{ $slot }}

    <x-ui.app-footer />

    <script src="{{ asset('app/js/jquery.js') }}"></script>

    <script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('app/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('app/js/isotope.js') }}"></script>
    <script src="{{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('app/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('app/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('app/js/wow.min.js') }}"></script>
    <script src="{{ asset('app/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('app/js/custom.js') }}"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGVCIwbinX0ILIm8KundVXgzkX_yPLsgU"></script>
    <script src="{{ asset('app/js/gmaps.js') }}"></script>
    <script src="{{ asset('app/js/map-helper.js') }}"></script>

    @stack('scripts')
</body>

</html>
