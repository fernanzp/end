<!-- SIDEBAR -->
<section id="sidebar" class="bg-gray-900 w-64 h-screen fixed transform transition-all duration-300 z-50 ">
    <div class="brand flex items-center px-6 py-4 text-white text-lg font-bold">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" alt="User Image" class="mr-3 w-4 h-4 rounded-full">
            <!-- Texto que se ocultará en modo comprimido -->
            <span class="sidebar-text">Education Non-Disparity</span>
        </a>
    </div>
    <ul class="side-menu mt-6 px-4 flex flex-col">

        <!-- PANTALLAS TERMINADAS -->
        <li class="my-2 relative group">
            <a href="{{ url('/') }}" class="flex items-center text-center text-white py-2 hover:bg-gray-700">
                <i class="fa-solid fa-house mr-4 "></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Inicio
                </span>
                <span class="sidebar-text">Inicio</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/administration') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-dashboard mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Administración
                </span>
                <span class="sidebar-text">Administración</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('usuario/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-user mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Mi cuenta
                </span>
                <span class="sidebar-text">Mi cuenta</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/usuario/programas') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bx-calendar mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Programas
                </span>
                <span class="sidebar-text">Programas</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/admin/gestion_de_usuarios') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <!-- <i class="fa-solid fa-right-from-bracket mr-4"></i> -->
                <i class='bx bxs-report mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Gestión de usuarios
                </span>
                <span class="sidebar-text">Gestión de usuarios</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/admin/solicitudes_de_usuarios') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-user-badge mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Solicitudes de usuarios
                </span>
                <span class="sidebar-text">Solicitudes de usuarios</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('admin/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-calendar-plus mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Solicitud de programas
                </span>
                <span class="sidebar-text">Solicitud de programas</span>
            </a>
        </li>

        <!-- PANTALLAS POR HACER -->
        <li class="my-2 relative group">
            <a href="{{ url('/programas') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bx-calendar mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Dashboard del usuario
                </span>
                <span class="sidebar-text">Dasboard del usuario</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('admin/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-file mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Informes
                </span>
                <span class="sidebar-text">Informes</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('coordinador/reportes') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <!-- <i class="fa-solid fa-right-from-bracket mr-4"></i> -->
                <i class='bx bxs-report mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Reportes de programas
                </span>
                <span class="sidebar-text">Reportes de programas</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/logout') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-user mr-4' ></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Asignación de roles a programas
                </span>
                <span class="sidebar-text">Asignación de roles a programas</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/admin') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-conversation mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Mensajería
                </span>
                <span class="sidebar-text">Mensajería</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('admin/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-user-voice mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Retroalimentación de los programas
                </span>
                <span class="sidebar-text">Retroalimentación de los programas</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('coordinador/reportes') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <!-- <i class="fa-solid fa-right-from-bracket mr-4"></i> -->
                <i class='bx bxs-package mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Asignación de recursos
                </span>
                <span class="sidebar-text">Asignación de recursos</span>
            </a>
        </li>
        <li class="my-2 relative group">
            <a href="{{ url('/logout') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class="fa-solid fa-right-from-bracket mr-4"></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Cerrar sesión
                </span>
                <span class="sidebar-text">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</section>