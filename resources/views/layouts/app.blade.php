<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Qawmi madrasha talimat software">
        <meta name="author" content="Hasan Habib">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ESS Dashboard</title>
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('assets') }}/img/brand/favicon.png" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <!-- Page plugins -->
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/quill/dist/quill.core.css">
        <!-- Argon CSS -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <style>
    body.en {
        font-size: 1.2em;
        }

    body.bn {
        font-size: 1.2em;
    }
  </style>
     
    </head>
    <body class="{{ app()->getLocale() ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')

            @include('layouts.flash-message')

            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="{{ asset('assets') }}/vendor/js-cookie/js.cookie.js"></script>
        <script src="{{ asset('assets') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="{{ asset('assets') }}/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/nouislider/distribute/nouislider.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/quill/dist/quill.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/dropzone/dist/min/dropzone.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <!-- Argon JS -->
        <script src="{{ asset('assets') }}/js/argon.js?v=1.1.0"></script>
        <!-- Demo JS - remove this in your project -->
        <script src="{{ asset('assets') }}/js/demo.min.js"></script>
    </body>
</html>