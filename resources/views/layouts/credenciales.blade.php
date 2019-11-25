<!DOCTYPE html>
<html lang="es" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="application-name" content="ADPROY" lang="es">
        <meta name="author" content="DEV SYSTEM">
        <meta name="keywords" content="">

        <title>@yield('title')</title>

        <link href="{{ asset('images/favicon.ico') }}" rel="Shortcut icon">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.10/css/AdminLTE.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <link type="text/css" rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        @yield('content')

        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        
        <!--
        <script type="text/javascript" src="{{ asset('js/jQuery-2.1.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sesion_google.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popover_main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/one.app.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/login.min.js') }}"></script>   
        -->

        @yield('scripts')

    </body>

</html>
