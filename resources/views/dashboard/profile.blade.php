<x-head />

<body class=" bg-customDarkGray font-sans antialiased">

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
            <h2 class="text-2xl font-bold mb-4">Mi Perfil</h2>

            <!-- Profile Info -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <div class="flex items-center space-x-4">
                    <div>
                        <img src="#" class="w-16 h-16 bg-gray-200 rounded-full">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">VERDUZCO LOPEZ WILVER ALEXIS</h3>
                        <p class="text-gray-500">BENEFICIARIO</p>
                        <p class="text-gray-400 text-sm">Creada: 19/02/2007</p>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-gray-700">INFORMACIÓN PERSONAL</h3>
                    <button class="text-blue-500 flex items-center space-x-1 modal-link" data-modal-target="information-modal">
                        <i class='bx bx-edit'></i>Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4 text-gray-600">
                    <p><span class="font-semibold">Nombres: </span> WILVER ALEXIS</p>
                    <p><span class="font-semibold">Apellidos: </span> VERDUZCO LÓPEZ</p>
                    <p><span class="font-semibold">Correo: </span> wverduzcoucol.mx</p>
                    <p><span class="font-semibold">Número de teléfono: </span> +543142413571</p>
                    <p><span class="font-semibold">Rol: </span> Beneficiario</p>
                    <p><span class="font-semibold">Contraseña: </span> contraseña123</p>
                </div>
                <p class="text-blue-500 text-sm ml-auto block text-right mt-4">
                    VER <a href="#" data-modal-target="terms-modal" class="text-customGreen modal-link">TÉRMINOS Y CONDICIONES</a>
                </p>
            </div>

            <!-- Address Information -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-gray-700">DIRECCIÓN PERSONAL</h3>
                    <button class="text-blue-500 flex items-center space-x-1 modal-link" data-modal-target="address-modal">
                        <i class='bx bx-edit'></i>Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4 text-gray-600">
                    <p><span class="font-semibold">Código postal: </span> 28219</p>
                    <p><span class="font-semibold">Estado: </span> COLIMA</p>
                    <p><span class="font-semibold">Municipio: </span> MANZANILLO</p>
                    <p><span class="font-semibold">Localidad: </span> MANZANILLO</p>
                    <p><span class="font-semibold">Colonia: </span> Nápoles</p>
                    <p><span class="font-semibold">Calle: </span> Avenida Insurgentes Sur</p>
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
            <h2 class="text-xl font-semibold mb-4">Información personal</h2>
            <p class="text-gray-700 mb-4">Aquí va la información personal del usuario en cuestión...</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal de botón de editar dirección -->
    <div id="address-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Dirección personal</h2>
            <p class="text-gray-700 mb-4">Aquí va la dirección del usuario en cuestión...</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
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
        // Seleccionar todos los enlaces de apertura de modal y los botones de cierre de modal
        const modalLinks = document.querySelectorAll('.modal-link');
        const modals = document.querySelectorAll('.modal');
        const closeModalButtons = document.querySelectorAll('.close-modal');

        // Abrir el modal correspondiente al enlace clicado
        modalLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetModalId = link.getAttribute('data-modal-target');
                const targetModal = document.getElementById(targetModalId);
                if (targetModal) {
                    targetModal.classList.remove('hidden');
                }
            });
        });

        // Cerrar modal al hacer clic en el botón de cierre
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                button.closest('.modal').classList.add('hidden');
            });
        });

        // Cerrar modal al hacer clic fuera del contenido del modal
        window.addEventListener('click', function(event) {
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>