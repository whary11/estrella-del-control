<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sé una estrella || Demuestra tu talento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/juego.min.css')}}">
</head>
<body>
    <div id="dash" v-cloak>
        <ul id="slide-out" class="sidenav teal lighten-5">
            <li>
                <div class="user-view">
                <a><img class="circle" width="190"></a>
                <a href="#" target="_blank"><span class="gray-text name">{{Auth::user()->name}}</span></a>
                    <a href="#"><span class="gray-text email">{{Auth::user()->email}}</span></a>
                </div>
            </li>
            
            <li><a href="#!">Ver perfil<i class="material-icons">face</i></a></li>
            
            <li><div class="divider"></div></li>
            <li><a href="{{ url('admin/facturacion') }}">Actualizar Cuenta<i class="material-icons">autorenew</i></a></li>
            
            <li><div class="divider"></div></li>
            <li><a href="{{ url('/admin/crear-sucursal') }}">Crear Sucursal<i class="material-icons">where_to_vote</i></a></li>
            <li><div class="divider"></div></li>
            
            <li><a class="sidenav-close" href="#!">Cerrar<i class="material-icons">keyboard_backspace</i></a></li>
            <li><div class="divider"></div></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="red-text">Cerrar Sesión<i class="material-icons">power_settings_new</i></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
        <div class="navbar-fixed">
            <nav class="teal">
                <div class="nav-wrapper">
                        <div href="#" data-target="slide-out" style="cursor: pointer;" class="sidenav-trigger" id="menuLateral"><i class="material-icons large">menu</i></div>
                        <a class="brand-logo center">
                            <img src="{{asset('img/cabecera.png')}}" alt="Menus Facil Logo" width="100px" class="imagen-logo" style="margin-top:-20px;">
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="material-icons">power_settings_new</i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    @yield('content')


{{-- Contenido de la aplicación --}}








    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul>
    </div>
    <!-- Compiled and minified JavaScript -->
    <!-- <script src="{{ asset('/js/materialize.min.js')}}"></script> -->
    
</body>
</html>