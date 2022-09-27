<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion de Contratos</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand">Gestion de Contratos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    @can('admin-list')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-lock"></i> Administracion
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                            @can('user-list')
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></li>
                            @endcan
                            @can('role-list')
                            <li><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('permission-list')
                            <li><a class="dropdown-item" href="{{ route('permissions.index') }}">Permisos</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('post-admin-juri')
                    <li><a class="nav-link" href="#"><i class="fas fa-tasks"></i> Mis Tareas</a></li>
                    @endcan
                    @can('post-list')
                    <li><a class="nav-link" href="{{ route('posts.index') }}"> <i class="fa-regular fa-calendar"></i> Solicitudes</a></li>
                    @endcan
                    @can('post-list')
                    <li><a class="nav-link" href="#"> <i class="far fa-handshake"></i> Contratos</a></li>
                    @endcan
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-building"></i> Contratantes
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                            @can('clientes-list')
                            <li><a class="dropdown-item" href="#">Clientes</a></li>
                            @endcan
                            @can('proveedores-list')
                            <li><a class="dropdown-item" href="#">Proveedores</a></li>
                            @endcan

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-landmark"></i> Maestros
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                            @can('file-list')
                            <li><a class="dropdown-item" href="{{ route('files.index') }}">Expedientes</a></li>
                            @endcan
                            @can('ceco-list')
                            <li><a class="dropdown-item" href="{{ route('cecos.index') }}">Cecos</a></li>
                            @endcan
                            @can('society-list')
                            <li><a class="dropdown-item" href="{{ route('societies.index') }}">Sociedades</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Perfil</a></li>
                            <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>