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
        <!--Inicio-->
        <li class="my-2 relative group">
            <a href="{{ url('/') }}" class="flex items-center text-center text-white py-2 hover:bg-gray-700">
                <i class="fa-solid fa-house mr-4 "></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Inicio
                </span>
                <span class="sidebar-text">Inicio</span> <!-- U B V A C   ll-->
            </a>
        </li>

        <!--Análisis-->
        @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('/administration/analysis') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-dashboard mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Análisis
                    </span>
                    <span class="sidebar-text">Análisis</span> <!-- A C   ll-->
                </a>
            </li>
        @endif

        <!--Mi cuenta-->
        <li class="my-2 relative group">
            <a href="{{ url('/configuration/myaccount') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bxs-user mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Mi cuenta
                </span>
                <span class="sidebar-text">Mi cuenta</span> <!-- U B V A C   ll-->
            </a>
        </li>

        <!--Programas-->
        @if(in_array(Auth::user()->rol, ['admin', 'coordinator', 'beneficiary', 'volunteer']))
            <li class="my-2 relative group">
                <a href="{{ url('/usuario/programas') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bx-calendar mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Programas
                    </span>
                    <span class="sidebar-text">Programas</span> <!-- B V A C   ll-->
                </a>
            </li>
        @endif

        <!--Gestión de usuarios-->
        @if(Auth::user()->rol === 'admin')
            <li class="my-2 relative group">
                <a href="{{ url('/admin/gestion_de_usuarios') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <!-- <i class="fa-solid fa-right-from-bracket mr-4"></i> -->
                    <i class='bx bxs-report mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Gestión de usuarios
                    </span>
                    <span class="sidebar-text">Gestión de usuarios</span> <!-- A   ll-->
                </a>
            </li>
        @endif

        <!--Solicitudes de usuarios-->
        @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('/admin/solicitudes_de_usuarios') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-user-badge mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Solicitudes de usuarios
                    </span>
                    <span class="sidebar-text">Solicitudes de usuarios</span> <!-- A C   ll-->
                </a>
            </li>
        @endif

        <!--Solicitud de programas-->
        @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('admin/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-calendar-plus mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Solicitud de programas
                    </span>
                    <span class="sidebar-text">Solicitud de programas</span> <!-- A C   ll-->
                </a>
            </li>
        @endif

        <!-- PANTALLAS POR HACER -->
        <!--Dasboard del usuario-->
        <li class="my-2 relative group">
            <a href="{{ url('/programas') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class='bx bx-calendar mr-4'></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Dashboard del usuario
                </span>
                <span class="sidebar-text">Dasboard del usuario</span> <!-- U B V A C -->
            </a>
        </li>

        <!--Informes-->
        @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('admin/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-file mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Informes
                    </span>
                    <span class="sidebar-text">Informes</span> <!-- A C   ll-->
                </a>
            </li>
        @endif

        <!--Reportes de programas-->
        @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('coordinador/reportes') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <!-- <i class="fa-solid fa-right-from-bracket mr-4"></i> -->
                    <i class='bx bxs-report mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Reportes de programas
                    </span>
                    <span class="sidebar-text">Reportes de programas</span> <!-- A C  ll-->
                </a>
            </li>
        @endif

        <!--Asignación de roles a programas-->
        @if(Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('/logout') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-user mr-4' ></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Asignación de roles a programas
                    </span>
                    <span class="sidebar-text">Asignación de roles a programas</span> <!-- C   ll-->
                </a>
            </li>
        @endif


        <!--Mensajería-->
        @if(in_array(Auth::user()->rol, ['admin', 'coordinator', 'beneficiary', 'volunteer']))
            <li class="my-2 relative group">
                <a href="{{ url('/admin') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-conversation mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Mensajería
                    </span>
                    <span class="sidebar-text">Mensajería</span> <!-- B V A C   ll-->
                </a>
            </li>
        @endif

        <!--Retroalimentación de los programas-->
        @if(Auth::user()->rol === 'beneficiary')
            <li class="my-2 relative group">
                <a href="{{ url('admin/perfil') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <i class='bx bxs-user-voice mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Retroalimentación de los programas
                    </span>
                    <span class="sidebar-text">Retroalimentación de los programas</span> <!-- B   ll-->
                </a>
            </li>
        @endif

        <!--Asignación de recursos-->
        @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
            <li class="my-2 relative group">
                <a href="{{ url('coordinador/reportes') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                    <!-- <i class="fa-solid fa-right-from-bracket mr-4"></i> -->
                    <i class='bx bxs-package mr-4'></i>
                    <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                        Asignación de recursos
                    </span>
                    <span class="sidebar-text">Asignación de recursos</span> <!-- A C   ll-->
                </a>
            </li>
        @endif

        <!--Cerrar sesión-->
        <li class="my-2 relative group">
            <a href="{{ url('/logout') }}" class="flex items-center text-white py-2 hover:bg-gray-700">
                <i class="fa-solid fa-right-from-bracket mr-4"></i>
                <span class="tooltip-text absolute left-10 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 hidden group-hover:block">
                    Cerrar sesión
                </span>
                <span class="sidebar-text">Cerrar sesión</span> <!-- U B V A C   ll-->
            </a>
        </li>
    </ul>
</section>