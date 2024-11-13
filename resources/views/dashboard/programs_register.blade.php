<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cee8dd5548.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Programas</title>
</head>
<body class=" bg-gray-100 font-sans antialiased">

    <style>
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
        <nav class="flex items-center justify-between bg-white shadow px-6 py-4 relative">
            <i class='bx bx-menu text-2xl cursor-pointer' id="menuBar"></i>
            <div class="flex items-center relative">
                <a href="#" class="notification relative mr-6" id="notificationBell">
                    <i class='bx bxs-bell text-2xl'></i>
                    <span class="num bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center absolute -top-2 -right-2">8</span>
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
                    <img src="https://via.placeholder.com/40" class="rounded-full" alt="User Image">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-4 mt-7">
            <h1 class="text-2xl font-bold text-gray-800">Programas</h1>
            <!-- <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 modal-link" data-modal-target="make_a_program-modal">
                <i class='bx bx-plus w-4 h-4'></i> Crear programa
            </button> -->
            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 modal-link" data-modal-target="request_a_program-modal">
                <i class='bx bx-plus w-4 h-4'></i> Solicitar programa
            </button>
        </div>

        
        <!-- Filters -->
        <div class="flex gap-4 mb-6">
            <input type="text" placeholder="Buscar" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
            <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                <option value="" disabled selected>Fecha</option>
                <option value="">Hoy</option>
                <option value="">Esta semana</option>
                <option value="">Este mes</option>
            </select>
            <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                <option value="" disabled selected>Ordenar por...</option>
                <option value="">Más inscritos</option>
                <option value="">Menos inscritos</option>
            </select>
            <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                <option value="" disabled selected>Tema</option>
                <option value="">Educativo</option>
                <option value="">Económico</option>
                <option value="">Cultural</option>
            </select>
        </div>

        <!-- Program List -->
        <div class="space-y-6 my-5">
            <!-- Program Item -->
            <div class="bg-white border border-gray-300 rounded-lg p-4 flex gap-6 shadow">
                <div class="w-2/3">
                    <div class="flex items-center gap-2">
                        <img src="default.jpg" alt="Foto de perfil" class="w-8 h-8 rounded-full">
                        <div>
                            <h2 class="text-lg font-semibold">Alexis Verduzco</h2>
                            <p class="text-gray-500 text-sm">Coordinador</p>
                        </div>
                        <div class="ml-4">
                            <span class="text-gray-500 ml-auto text-base text-left">15/09/2023</span>
                        </div>
                        <!-- Iconos de editar y eliminar -->
                        <div class="flex gap-2 ml-4">
                            <button class="text-gray-400 hover:text-gray-600 modal-link" data-modal-target="program_info-modal"><i class="fas fa-edit"></i></button>
                            <button class="text-gray-400 hover:text-gray-600 modal-link" data-modal-target="delete_program-modal"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="w-full mt-2">
                        <h3 class="font-bold text-gray-800">Niños del futuro: Asistencia y protección para los más vulnerables</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro, esse ratione. Magnam, perferendis illum. Soluta veritatis cupiditate eius earum architecto nulla explicabo rem fugit iure fugiat! Cumque rem autem natus eligendi vitae, sunt praesentium rerum sed architecto adipisci reprehenderit error animi ea ut tempore. Quae, natus cupiditate iure fugit quasi recusandae ex esse pariatur repellat molestias necessitatibus voluptatum illo quia laboriosam voluptate doloribus fugiat vero architecto ipsum sequi facilis. Distinctio obcaecati suscipit nulla eligendi repellat unde soluta similique porro impedit iure doloremque rerum dolorum blanditiis facilis, necessitatibus vitae debitis! Non, cum reiciendis. Totam vero maiores odio. Sed ut fugit illum.
                        </p>
                        <button class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 mt-8">¡Quiero participar!</button>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-between">
                    <img src="{{ asset('img/Fondo-index.jpg') }}" alt="Imagen de programa" class="w-full h-64 rounded-lg object-cover shadow-lg">
                </div>
            </div>
        </div>
    </section>
    
    <!-- MODAL DEL "CREAR PROGRAMA" -->
    <div id="make_a_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Crear programa</h2>
            <p class="text-gray-700 mb-4">Inserta inputs necesarios para el programa</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- MODAL DEL "CREAR PROGRAMA" -->
    <div id="request_a_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Solicita un programa</h2>
            <p class="text-gray-700 mb-4">Inserta inputs necesarios para el programa</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal de botón para editar el programa -->
    <div id="program_info-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Editar</h2>
            <p class="text-gray-700 mb-4">Aquí va la información del programa en cuestión</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para borrar un programa -->
    <div id="delete_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">¿Deseas eliminar este programa?</h2>
            <p class="text-gray-700 mb-4">Aquí van las 2 opciones</p>
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
