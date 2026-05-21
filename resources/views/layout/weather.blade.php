<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ======================================================
    | META TAGS
    ======================================================= -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>

        @yield('title', 'Weather Dashboard')

    </title>

    <!-- ======================================================
    | GOOGLE FONT
    ======================================================= -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- ======================================================
    | BOOTSTRAP
    ======================================================= -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- ======================================================
    | FONT AWESOME
    ======================================================= -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    <!-- ======================================================
    | GLOBAL CSS
    ======================================================= -->

    <link rel="stylesheet"
          href="{{ asset('assets/css/weather-home.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/weather-header.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/weather-footer.css') }}">

    <!-- ======================================================
    | EXTRA PAGE CSS
    ======================================================= -->

    @stack('styles')

</head>

<body>

<!-- ======================================================
| HEADER
====================================================== -->

@include('layout.partials.header')

<!-- ======================================================
| MAIN CONTENT
====================================================== -->

<main class="main-wrapper">

    @yield('content')

</main>

<!-- ======================================================
| FOOTER
====================================================== -->

@include('layout.partials.footer')

<!-- ======================================================
| JQUERY
====================================================== -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- ======================================================
| BOOTSTRAP
====================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ======================================================
| SWEET ALERT
====================================================== -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ======================================================
| PAGE CONFIG SCRIPTS
====================================================== -->

@stack('scripts')


<!-- ======================================================
| WEATHER JS
====================================================== -->

<script src="{{ asset('assets/js/weather-header.js') }}"></script>
<script src="{{ asset('assets/js/weather-home.js') }}"></script>

<!-- ======================================================
| EXTRA SCRIPTS
====================================================== -->

@yield('scripts')

</body>
</html>