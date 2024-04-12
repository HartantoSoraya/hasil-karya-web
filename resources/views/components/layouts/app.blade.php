<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>
        {{ $title }}
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('app/fonts/logo-hk.pnge') }}" type="image/x-icon">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('app/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">

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
