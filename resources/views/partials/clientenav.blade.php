<nav>
    <ul>
        <li><a href="/clientes/Home">Inicio</a></li>
        <li><a href="/clientes/Damas">Damas </a></li>
        <li><a href="/clientes/Caballeros">Caballeros</a></li>
        <li><a href="/clientes/Infantil">Infantil</a></li>
        <li><a href="/clientes/Colecciones">Colecciones</a></li>

        @guest
            <!--Visible si no esta logueado -->
        <li> <a href="/clientes/Login">Iniciar Sesión</a></li>
        <li><a href="/clientes/LoginRegister">Registrarse</a></li>
        <!-- FIn Visible si no esta logueado-->
        @endguest
        
        @auth
        <!--debe ir condicion de estar logeado -->
        <li><a href="/dashboard/Homeboard">Dashboard </a></li>
        <li> <a href="/clientes/Logout">Cerrar sesión </a></li>
        <!--debe ir condicion de estar logeado -->
        @endauth
        
    </ul>
</nav>