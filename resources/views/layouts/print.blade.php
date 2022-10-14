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

        
        h1, h2 {
        font-family: 'bangla', serif;
        }

        a{
        color: #825582;
        text-decoration: none;
        }

        .content{
        background:#e6e2c8;
        width: 80%;
        max-width: 960px;
        min-height: 3.750em; 
        margin: 2em auto;
        padding: 1.250em;
        border-radius: 0.313em;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.5);
        line-height: 1.5em;
        color: #292929;
        }

        .ribbon{
        position:relative;
        padding: 0 0.5em;
        font-size:2.000em;
        margin: 0 0 0 -0.625em;
        line-height: 1.875em;
        color: #e6e2c8;
        border-radius: 0 0.156em 0.156em 0;
        background: rgb(123, 159, 199);
        box-shadow: -1px 2px 3px rgba(0,0,0,0.5);
        }

        .ribbon:before, .ribbon:after{
        position:absolute;
        content: '';
        display: block;
        }

        .ribbon:before{
        width: 0.469em;
        height: 100%;
        padding: 0 0 0.438em;
        top:0;
        left: -0.469em;
        background:inherit;
        border-radius: 0.313em 0 0 0.313em;
        }

        .ribbon:after{
        width: 0.313em;
        height: 0.313em;
        background: rgba(0,0,0,0.35);
        bottom: -0.313em;
        left: -0.313em;
        border-radius: 0.313em 0 0 0.313em;
        box-shadow: inset -1px 2px 2px rgba(0,0,0,0.3);
        }

        @media (max-width: 600px) {
        
        body{
            font-size:0.875em;
        }
        
        .ribbon{
            line-height: 1.143em;
            padding: 0.5em;
        }
        
        .ribbon:before, .ribbon:after{
            font-size: 0.714em;
        }
        
        }
 
     </style>
    </head>
    <body>
        <div class="main-content style=" style="font-family: SolaimanLipi, sans-serif;">
            @include('layouts.print.printheader')

            @yield('content')

            @include('layouts.print.printfooter')
        </div>
    </body>
</html>