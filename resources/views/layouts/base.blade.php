<!DOCTYPE html>
<html lang="es" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="application-name" content="ADPROY" lang="es">
        <meta name="author" content="DEV SYSTEM">
        <meta name="keywords" content="">
        <link href="{{ asset('images/favicon.ico') }}" rel="Shortcut icon">

        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.10/css/AdminLTE.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!--
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        -->

        <link type="text/css" rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('_all-skins.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/skin-red-light.min.css') }}">

    </head>
    <body id="content_complete" class="skin-red-light sidebar-mini">

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="./datos.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">PRO</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        @if(auth()->user()->rol == 1)
                            ADMINISTRADOR
                        @elseif(auth()->user()->rol == 2 )
                            DOCENTE
                        @else
                            ESTUDIANTE
                        @endif
                    </span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation" style="height:50px">
                    <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

            @if (auth()->user()->rol == 1)
                @include('partials.sidebar-admin')
            @elseif (auth()->user()->rol == 2)
                @include('partials.sidebar-teacher')
            @else
                @include('partials.sidebar-student')
            @endif


            @if( auth()->user()->estado == 1 )
                @yield('content')
            @elseif( auth()->user()->estado == 0 )
                @include('partials.waiting')
            @else
                @include('partials.decline')
            @endif

            <footer class="main-footer">
                DEV SYSTEM © 2019. <span class="hidden-xs">Version <b>1.0</b></span>
            </footer>

        </div>


        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/portales.js') }}"></script>

        @yield('scripts')


    </body>

</html>
