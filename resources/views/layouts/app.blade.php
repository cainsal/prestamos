<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestión de Solicitudes de Préstamos Rápido') }}</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <!-- include VueJS first -->
    <script src="https://unpkg.com/vue@latest"></script>

    <!-- use the latest vue-select release -->
    <script src="https://unpkg.com/vue-select@latest"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">

    <style>
        .img-logo {
            display: flex;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            width: 55%;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"> </script>
    <link rel="shortcut icon" href="{{ asset('imagenes/favicon-miyunta.jpg') }}">

    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.4-beta.33/inputmask.min.js"></script>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="mx-0" style="background-color: #ff394a;">
            <div class="row">
                <div class="col-md-6 pl-5">
                    <img src="{{ asset('imagenes/favicon-miyunta.jpg') }}" width="80px" alt="Logo App Mi Yunta" style="margin: 10px 0px; ">
                </div>
                <div class="col-md-5 my-auto text-right">
                    <span class="text-light font-weight-bolder">Gestión de Solicitudes de Préstamos Rápido</span>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--{{ config('app.name', 'Laravel') }}-->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if (Auth::user()->rol !== 'Cliente')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('solicitudes') }}">{{ __('Solicitudes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ofertas') }}">{{ __('Ofertas') }}</a>
                        </li>
                        @elseif (Auth::user()->rol === 'Administrador')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listadoUsuarios') }}">{{ __('Usuarios') }}</a>
                        </li>
                        @elseif (Auth::user()->rol === 'Cliente')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ofertasCliente') }}">{{ __('Ofertas Activas') }}</a>
                        </li>
                        <li class="nav-item" hidden>
                            <a class="nav-link" href="{{ route('ofertasProcesadasCliente') }}">{{ __('Ofertas Procesadas') }}</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>