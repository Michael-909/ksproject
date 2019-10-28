<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Melaka Ticket Booking</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome-all.min.css') }}">

    <!--calendar -->
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
      
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper admin-wrapper">
        @include('layout.admin_sidebar')
        <div class="main-panel">
            @include('layout.admin_auth')
            @yield('content')
            @include('layout.footer')
        </div>
    </div>

    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/vendor/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('js/vendor/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.bootstrap-wizard.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-selectpicker.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('js/vendor/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-jvectormap.js') }}"></script>
    <script src="{{ asset('js/vendor/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/vendor/arrive.min.js') }}"></script>
    <script src="{{ asset('js/vendor/chartist.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-notify.js') }}"></script>

    <script src="{{ asset('js/pages/material.min.js') }}"></script>
    <script src="{{ asset('js/pages/application.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    @stack('js')

</body>
</html>