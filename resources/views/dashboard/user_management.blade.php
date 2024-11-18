<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cee8dd5548.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Dashboard</title>
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

        <!-- MAIN -->
        <main class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Todos los usuarios</h2>
            <div class="mt-8 bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-center">Usuarios</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Rol</th>
                            <th class="p-3">Fecha de aceptado</th>
                            <th class="p-3">Estado</th>
                            <th class="p-3">CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3 "><span>Derick Fernandez</span></td>
                            <td class="p-3">Voluntario</td>
                            <td class="p-3">01-10-2024</td>
                            <td class="p-3"><span class="bg-green-300 text-green-700 py-1 px-3 rounded-full">Activo</span></td>
                            <td class="p-3">
                                <span>
                                    <button class="modal-link" data-modal-target="user_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="delete_user-modal"><i class='bx bx-trash mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Papu Fer</span></td>
                            <td class="p-3">Beneficiario</td>
                            <td class="p-3">05-09-2024</td>
                            <td class="p-3"><span class="bg-red-300 text-red-700 py-1 px-3 rounded-full">Inactivo</span></td>
                            <td class="p-3">
                                <span>
                                    <button class="modal-link" data-modal-target="user_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="delete_user-modal"><i class='bx bx-trash mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Papu Hector</span></td>
                            <td class="p-3">Beneficiario</td>
                            <td class="p-3">01-07-2024</td>
                            <td class="p-3"><span class="bg-gray-300 text-gray-700 py-1 px-3 rounded-full">Desactivado</span></td>
                            <td class="p-3">
                                <span>
                                    <button class="modal-link" data-modal-target="user_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="delete_user-modal"><i class='bx bx-trash mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

    <!-- Modal de botón para ver la información personal del usuario -->
    <div id="user_info-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Usuario</h2>
            <p class="text-gray-700 mb-4">Aquí va la información personal del usuario en cuestión...</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para borrar un usuario -->
<div id="delete_user-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
        <h2 class="text-xl font-semibold mb-4">¿Deseas eliminar a este usuario?</h2>
        <p class="text-gray-700 mb-4">Esta acción eliminará permanentemente al usuario.</p>
        <div class="flex justify-end space-x-4">
            <!-- Botones de Cancelar y Aceptar -->
            <button id="cancel-delete" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Cancelar</button>
            <button id="confirm-delete" class="bg-red-500 text-white px-4 py-2 rounded-lg">Aceptar</button>
        </div>
        <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
    
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->

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
    
    <script>
        // Selección de los botones
        const cancelDeleteButton = document.getElementById('cancel-delete');
        const confirmDeleteButton = document.getElementById('confirm-delete');
        const deleteUserModal = document.getElementById('delete_user-modal');
        
        // Botón de cancelar: cierra el modal sin eliminar
        cancelDeleteButton.addEventListener('click', function() {
            deleteUserModal.classList.add('hidden');
        });
        
        // Botón de aceptar: elimina al usuario (aquí puedes agregar la lógica para eliminar al usuario)
        confirmDeleteButton.addEventListener('click', function() {
            // Aquí agregas la lógica para eliminar al usuario
            console.log("Usuario eliminado"); // Este es solo un ejemplo
            deleteUserModal.classList.add('hidden'); // Cerrar el modal después de eliminar
        });
    
        // Mostrar modal de eliminación al hacer clic en el botón correspondiente
        const deleteUserButtons = document.querySelectorAll('[data-modal-target="delete_user-modal"]');
        deleteUserButtons.forEach(button => {
            button.addEventListener('click', function() {
                deleteUserModal.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>

