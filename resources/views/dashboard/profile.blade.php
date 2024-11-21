<x-head />

<body class="bg-customDarkGray font-sans antialiased">

    <style>
        <x-styles />

        .compressed .sidebar-text {
            display: none;
        }

        /* Oculta el texto del sidebar cuando está comprimido */
        #sidebar.compressed .sidebar-text {
            display: none;
        }

        /* Muestra el tooltip solo cuando el sidebar está comprimido y se hace hover en el elemento */
        #sidebar.compressed .my-2:hover .tooltip-text {
            display: block;
            opacity: 1;
        }
    </style>
    

    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-8 transition-all duration-300">

        <!-- NAVBAR -->
        <nav class="flex items-center justify-between rounded-lg bg-customLighterGray shadow px-6 py-4 relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="menuBar" class="w-8 h-8 cursor-pointer" fill="#1ab76a"><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
            <div class="flex items-center relative">
                <a href="#" class="notification relative mr-6" id="notificationBell">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-8 h-8 cursor-pointer" fill="#1ab76a"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                    <span class="num bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center absolute -top-1 -right-1">8</span>
                </a>
                <!-- Dropdown de Notificaciones -->
                <div id="notificationDropdown" class="hidden absolute right-0 mt-64 w-64 bg-white shadow-lg rounded-md overflow-hidden z-20">
                    <div class="px-4 py-2 text-sm text-gray-700 border-b">Notificaciones</div>
                    <ul class="py-2">
                        <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Notificación 1</li>
                        <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Notificación 2</li>
                        <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Notificación 3</li>
                    </ul>
                    <div class="px-4 py-2 text-sm text-center text-blue-500 cursor-pointer hover:underline">
                        Ver todas las notificaciones
                    </div>
                </div>
                <a href="#" class="profile" onclick="toggleMenu()">
                    <img src="{{ asset(Auth::user()->profile_img) }}" alt="User Image" class="w-12 h-12 rounded-full mx-auto">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main class="flex-1 mt-8">
            <h2 class="text-2xl text-customGreen font-bold mb-4">Mi Perfil</h2>

            <!-- Profile Info -->
            <div class="bg-customLighterGray shadow rounded-lg p-6 mb-6">
                <div class="flex items-center space-x-4">
                    <div>
                        <img src="{{ asset(Auth::user()->profile_img) }}" alt="User Image" class="w-16 h-16 rounded-full mx-auto">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-customBeige">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
                        <p class="text-gray-500">{{ Auth::user()->rol }}</p>
                        <p class="text-gray-400 text-sm">Creada: 19/02/2007</p>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="bg-customLighterGray shadow rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-customBeige">INFORMACIÓN PERSONAL</h3>
                    <button class="text-customBeige flex items-center space-x-1 modal-link" data-modal-target="information-modal">
                        <i class='bx bx-edit'></i>Editar
                    </button>
                </div>
                <div id="info-personal" class="grid grid-cols-2 gap-4 text-gray-400">
                    <p class="text-gray-400 font-semibold">Nombre(s): <span id="nombres-text" class="text-customBeige">{{ Auth::user()->name }}</span></p>
                    <p class="text-gray-400 font-semibold">Apellidos: <span id="apellidos-text" class="text-customBeige">{{ Auth::user()->last_name }}</span></p>
                    <p class="text-gray-400 font-semibold">Correo: <span class="text-customBeige">{{ Auth::user()->email }}</span></p>
                    <p class="text-gray-400 font-semibold">Número de teléfono: <span id="telefono-text" class="text-customBeige">+543142413571</span></p>
                    <p class="text-gray-400 font-semibold">Rol: <span class="text-customBeige">{{ Auth::user()->rol }}</span></p>
                    <p class="text-gray-400 font-semibold">Contraseña: <span class="text-customBeige">contraseña123</span></p>
                </div>
                <p class="text-customBeige text-sm ml-auto block text-right mt-4">
                    <a href="#" data-modal-target="terms-modal" class="modal-link"> VER TÉRMINOS Y CONDICIONES</a>
                </p>
            </div>

            <!-- Address Information -->
            <div id="address-info" class="bg-customLighterGray shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-customBeige">DIRECCIÓN PERSONAL</h3>
                    <button class="text-customBeige flex items-center space-x-1 modal-link" data-modal-target="address-modal">
                        <i class='bx bx-edit'></i>Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <p class="text-gray-400 font-semibold">Código postal: <span id="cp-text" class="text-customBeige">28219</span></p>
                    <p class="text-gray-400 font-semibold">Estado: <span id="estado-text" class="text-customBeige">COLIMA</span></p>
                    <p class="text-gray-400 font-semibold">Municipio: <span id="municipio-text" class="text-customBeige">MANZANILLO</span></p>
                    <p class="text-gray-400 font-semibold">Localidad: <span id="localidad-text" class="text-customBeige">MANZANILLO</span></p>
                    <p class="text-gray-400 font-semibold">Colonia: <span id="colonia-text" class="text-customBeige">Nápoles</span></p>
                    <p class="text-gray-400 font-semibold">Calle: <span id="calle-text" class="text-customBeige">Avenida Insurgentes Sur</span></p>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>

    <!-- Modal de Términos y Condiciones -->
    <div id="terms-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Términos y Condiciones</h2>
            <p class="text-gray-700 mb-4">Aquí van los términos y condiciones de uso...</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal de botón de editar información personal -->
    <div id="information-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Editar Información Personal</h2>
            <form id="edit-personal-info-form" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nombres</label>
                    <input type="text" id="edit-nombres" class="w-full p-2 border border-gray-300 rounded" value="WILVER ALEXIS">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Apellidos</label>
                    <input type="text" id="edit-apellidos" class="w-full p-2 border border-gray-300 rounded" value="VERDUZCO LÓPEZ">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Número de Teléfono</label>
                    <input type="tel" id="edit-telefono" class="w-full p-2 border border-gray-300 rounded" value="+543142413571">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" class="close-modal bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                        Cancelar
                    </button>
                    <button type="button" id="save-personal-info" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de botón de editar dirección -->
    <div id="address-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
        <h2 class="text-xl font-semibold mb-4">Editar Dirección</h2>
            <form id="edit-address-form" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Código Postal</label>
                    <input type="text" id="edit-cp" class="w-full p-2 border border-gray-300 rounded" value="28219">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Estado</label>
                    <input type="text" id="edit-estado" class="w-full p-2 border border-gray-300 rounded" value="COLIMA">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Municipio</label>
                    <input type="text" id="edit-municipio" class="w-full p-2 border border-gray-300 rounded" value="MANZANILLO">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Localidad</label>
                    <input type="text" id="edit-localidad" class="w-full p-2 border border-gray-300 rounded" value="MANZANILLO">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Colonia</label>
                    <input type="text" id="edit-colonia" class="w-full p-2 border border-gray-300 rounded" value="Nápoles">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Calle</label>
                    <input type="text" id="edit-calle" class="w-full p-2 border border-gray-300 rounded" value="Avenida Insurgentes Sur">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" class="close-modal bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                        Cancelar
                    </button>
                    <button type="button" id="save-address" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Selección de elementos
    const menuBar = document.getElementById('menuBar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const notificationBell = document.getElementById('notificationBell');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const sidebarTextElements = document.querySelectorAll('.sidebar-text');

    // Mostrar/Ocultar el dropdown de notificaciones
    notificationBell.addEventListener('click', function (event) {
        event.preventDefault();
        notificationDropdown.classList.toggle('hidden');
    });

    // Ocultar el dropdown si se hace clic fuera de él
    window.addEventListener('click', function (e) {
        if (!notificationBell.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.add('hidden');
        }
    });

    menuBar.addEventListener('click', function () {
        // Alternar clase comprimido en el sidebar
        sidebar.classList.toggle('compressed');

        // Cambiar el ancho del sidebar y ajustar el margen del contenido
        sidebar.classList.toggle('w-16');
        sidebar.classList.toggle('w-64');
        content.classList.toggle('ml-16');
        content.classList.toggle('ml-64');
    });
    
	</script>

    <script>
        // Funcionalidad de guardar Información Personal
    document.getElementById('save-personal-info').addEventListener('click', function () {
        const nombres = document.getElementById('edit-nombres').value;
        const apellidos = document.getElementById('edit-apellidos').value;
        const telefono = document.getElementById('edit-telefono').value;
        // Actualiza solo los elementos editables
        document.getElementById('nombres-text').textContent = nombres;
        document.getElementById('apellidos-text').textContent = apellidos;
        document.getElementById('telefono-text').textContent = telefono;
        // Cierra el modal
        document.getElementById('information-modal').classList.add('hidden');
    });
            // Funcionalidad de guardar Dirección Personal
            document.getElementById('save-address').addEventListener('click', function () {
        // Obtener los nuevos valores de los campos del formulario
        const cp = document.getElementById('edit-cp').value;
        const estado = document.getElementById('edit-estado').value;
        const municipio = document.getElementById('edit-municipio').value;
        const localidad = document.getElementById('edit-localidad').value;
        const colonia = document.getElementById('edit-colonia').value;
        const calle = document.getElementById('edit-calle').value;
        // Actualizar los elementos del bloque de dirección sin reemplazar toda la estructura
        document.getElementById('cp-text').textContent = cp;
        document.getElementById('estado-text').textContent = estado;
        document.getElementById('municipio-text').textContent = municipio;
        document.getElementById('localidad-text').textContent = localidad;
        document.getElementById('colonia-text').textContent = colonia;
        document.getElementById('calle-text').textContent = calle;
                document.getElementById('address-modal').classList.add('hidden');
            });
            // Funcionalidad para abrir y cerrar modales
            document.querySelectorAll('.modal-link').forEach(button => {
                button.addEventListener('click', function () {
                    const targetModal = this.getAttribute('data-modal-target');
                    document.getElementById(targetModal).classList.remove('hidden');
                });
            });
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', function () {
                    this.closest('.modal').classList.add('hidden');
                });
            });
    </script>
</body>
</html>