<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Qawmi madrasha talimat software">
        <meta name="author" content="Hasan Habib">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PDF export</title>
        <!-- Favicon -->
        <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <!-- Page plugins -->
        <link rel="stylesheet" href="../../assets/vendor/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="../../assets/vendor/quill/dist/quill.core.css">
        <!-- Argon CSS -->
        <link rel="stylesheet" href="../../assets/css/argon.css?v=1.1.0" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
     <style>
     <style>
        @font-face {
            font-family: 'SolaimanLipi';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("{{ storage_path('fonts\SolaimanLipi.ttf') }}") format('truetype');;
        }
        body {
            font-family: 'bangla', Arial, sans-serif;
        }
        /*almost everything here is em based*/
        @import url(https://fonts.googleapis.com/css?family=Crete+Round);

        
     </style>
    </head>
    <body>
        <div class="">

            @yield('content')

        </div>
    </body>
</html>