<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpeg') }}" class="img-fluid mr-2" style="width: 12%">
            SIS-RADF
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ ! Route::is('home') ?: 'active' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown {{ ! Route::is('registro.archivos') ?: 'active' }} {{ ! Route::is('registro.historial') ?: 'active' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registro
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ ! Route::is('registro.archivos') ?: 'active' }}" href="{{ route('registro.archivos') }}">Archivos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item {{ ! Route::is('registro.historial') ?: 'active' }}" href="{{ route('registro.historial') }}">Historial</a>
                    </div>
                </li>
                <li class="nav-item dropdown
                    {{ ! Route::is('deteccionFacial.index') ?: 'active' }}
                    {{ ! Route::is('historialFacial.index') ?: 'active' }}
                    {{ ! Route::is('deteccionMovimiento.index') ?: 'active' }}"
                >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SIS RADF
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">A time</a>
                        <a class="dropdown-item {{ ! Route::is('deteccionFacial.index') ?: 'active' }}"  href="{{route('deteccionFacial.index')}}">Detección Facial</a>
                        <a class="dropdown-item {{ ! Route::is('deteccionMovimiento.index') ?: 'active'}}" href="{{route('deteccionMovimiento.index')}}">Detección Movimiento</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Recorrido GPS</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ ! Route::is('seccional.brigada') ?: 'active' }} {{ ! Route::is('seccional.batallones') ?: 'active' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Seccional
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ ! Route::is('seccional.brigada') ?: 'active' }}" href="{{ route('seccional.brigada') }}">Brigada</a>
                        <a class="dropdown-item {{ ! Route::is('seccional.batallones') ?: 'active' }}" href="{{ route('seccional.batallones') }}">Batallones</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ ! Route::is('usuarios') ?: 'active' }} {{ ! Route::is('guardia') ?: 'active' }} {{ ! Route::is('permisos') ?: 'active' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuarios
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ ! Route::is('usuarios') ?: 'active' }}" href="{{ route('usuarios') }}">Listar / Agregar / Permisos y demas</a>
                        <a class="dropdown-item {{ ! Route::is('guardia') ?: 'active' }}" href="{{ route('guardia') }}">Guardia</a>
                        <a class="dropdown-item {{ ! Route::is('permisos') ?: 'active' }}" href="{{ route('permisos') }}">Permisos</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ ! Route::is('inventarioAlimentos.index') ?: 'active' }}
                    {{ ! Route::is('inventarioAlmacen.index') ?: 'active' }}
                    {{ ! Route::is('inventarioArmamento.index') ?: 'active' }}
                    {{ ! Route::is('inventarioInsumos.index') ?: 'active' }}
                ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inventario
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ ! Route::is('inventarioAlmacen.index') ?: 'active' }}" href="{{route('inventarioAlmacen.index')}}">Almacen TIC</a>
                        <a class="dropdown-item {{ ! Route::is('inventarioArmamento.index') ?: 'active' }}" href="{{route('inventarioArmamento.index')}}">Armamento y Munición</a>
                        <a class="dropdown-item {{ ! Route::is('inventarioAlimentos.index') ?: 'active' }}" href="{{route('inventarioAlimentos.index')}}">Alimentos</a>
                        <a class="dropdown-item {{ ! Route::is('inventarioInsumos.index') ?: 'active' }}" href="{{route('inventarioInsumos.index')}}">Insumos Sanidad Militar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item-text">{{ Auth::user()->names }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
