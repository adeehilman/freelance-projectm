<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo-maarif.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo-maarif.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">



    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('css/style.min.css') }}" />

    <style>
        .wizard-content .wizard>.content {
            background: transparent;
            overflow: hidden;
            position: relative;
            width: auto;
            padding: 0;
            margin: 0;
            height: 100vh;

        }

        @media only screen and (max-width: 767px) {

            /* Semua gaya yang Anda inginkan untuk ukuran layar di bawah 768px */
            h5.header-welcome {
                display: none;
                /* Menyembunyikan elemen h5 */
            }
        }

        @media only screen and (min-width: 600px) and (max-width: 999px) {

            /* Semua gaya yang Anda inginkan untuk ukuran layar antara 600px dan 767px */
            h5.header-welcome {
                display: none;
                /* Menyembunyikan elemen h5 */
            }
        }
    </style>

    @stack('styles')

</head>

<body>
    @section('mainheader')
        @include('layouts.mainheader')
    @show

    @section('mainsidebar')
        @include('layouts.mainsidebar')
    @show

    @section('mainnavbar')
        @include('layouts.mainnavbar')
    @show

    @yield('content')

    @section('mainfooter')
        @include('layouts.mainfooter')
    @show


    {{-- <main> --}}
    {{-- </main> --}}
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- core files -->
    <!-- ---------------------------------------------- -->
    {{-- <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/app.init.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('libs/prismjs/prism.js') }}"></script>

    {{-- Form js --}}
    <script src="{{ asset('libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/forms/form-wizard.js') }}"></script>

    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/flatpickr.js') }}"></script>

    @yield('script')



</body>

</html>
