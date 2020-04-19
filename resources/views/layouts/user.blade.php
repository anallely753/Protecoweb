<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaqueries.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Rufina&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <!-- nav-->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/icons/codeblanco.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    {{-- invitado --}}
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registro</a>
                    </li>
                    {{-- autenticado --}}
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Material</a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item dropleft">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->admin)
                            <a class="dropdown-item" href="{{ route('usuarios.index') }}">Admin</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('miperfil', $user->id) }}">Mi Perfil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                            </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="container text-white text-center pt-2">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p>Cel. 5618394983</p>
                </div>
                <div class="col-12 col-sm-6">
                    <a href="mailto: anallely.proteco@gmail.com" class="text-white">
                        <p class="text-white">anallely.proteco@gmail.com</p>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

</html>
