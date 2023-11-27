<header>
    @include('modalRegistrarUsuario')
    @include('modalPerfilUsuario')
    @include('modalCambiarPass')
    <nav>
        <ul>
            <li>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/programar.png') }}" alt="Imagen de horario.">
                    ASISTENCIAS
                </a>
            </li>
            <li>
                <a href="{{ route('listar-usuarios') }}">
                    <img src="{{ asset('images/usa.png') }}" alt="Imagen de usuario.">
                    USUARIOS
                </a>
            </li>
            <li>
                <a href="{{ route('listar-trabajadores') }}">
                    <img src="{{ asset('images/team.png') }}" alt="Imagen de trabajadores.">
                    TRABAJADORES
                </a>
            </li>
            <li>
                
                <a href="{{ route('cargos') }}">
                    <img src="{{ asset('images/cargo.png') }}" alt="Imagen de un trabajador.">
                    CARGOS
                </a>
            </li>
            <li>
                
                <a href="{{ route('info') }}">
                    <img src="{{ asset('images/info.png') }}" alt="Imagen de información.">ACERCA DE
                </a>
            </li>
            <li class="dropdown">
                <a href=""><i class="fa-solid fa-user-astronaut"></i>@auth {{Auth::user()->name}} @endauth</a>
                <div class="dropdown-options">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#perfil-usuario-{{ Auth::user()->id }}"><i class="fa-solid fa-user"></i> Perfil</a>

                    <a href="#" data-bs-toggle="modal" data-bs-target="#password-usuario-{{ Auth::user()->id }}"><i class="fa-solid fa-lock"></i> Cambiar contraseña</a>
                    
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registrar-usuario"><i class="fa-solid fa-right-to-bracket"></i> Registrar</a>
                    
                    <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                </div>
            </li>
        </ul>
    </nav>
</header>