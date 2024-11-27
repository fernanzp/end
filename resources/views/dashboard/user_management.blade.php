<x-head />
<body class=" bg-customDarkGray font-sans antialiased">

    <style>
        <x-styles />

        /* Oculta el texto del sidebar cuando está comprimido */
        #sidebar.compressed .sidebar-text {
            display: none;
        }

        /* Ajusta la visibilidad del tooltip */
        #sidebar .tooltip-text {
            visibility: hidden;
            opacity: 0;
            transition: visibility 0.2s, opacity 0.2s ease-in-out;
        }

        /* Muestra el tooltip cuando se hace hover */
        #sidebar.compressed .my-2:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
    

    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-8 transition-all duration-300">

        <x-navbar_configuration />

        <!-- MAIN -->
        <main class="mt-8">
            <h2 class="text-2xl text-customGreen font-bold mb-4">Gestión de usuarios</h2>
            <div class="mt-8 bg-customLighterGray p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold text-customGreen mb-4 text-center">Usuarios</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-customDarkGray">
                            <th class="p-3 text-customBeige">Nombre</th>
                            <th class="p-3 text-customBeige">Rol</th>
                            <th class="p-3 text-customBeige">Fecha de aceptado</th>
                            <th class="p-3 text-customBeige">Estado</th>
                            <th class="p-3 text-customBeige">CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Derick Fernandez</span></td>
                            <td class="p-3 text-customBeige">Voluntario</td>
                            <td class="p-3 text-customBeige">01-10-2024</td>
                            <td class="p-3"><span class="bg-green-300 text-green-900 py-1 px-3 rounded-full w-28 text-center inline-block font-semibold">Activo</span></td>
                            <td class="p-3">
                                <span style="color: #F5F5DC;">
                                    <button class="modal-link" data-modal-target="user_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="delete_user-modal"><i class='bx bx-trash mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Fer</span></td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">05-09-2024</td>
                            <td class="p-3"><span class="bg-red-300 text-red-900 py-1 px-3 rounded-full w-28 text-center inline-block font-semibold">Inactivo</span></td>
                            <td class="p-3">
                                <span style="color: #F5F5DC;">
                                    <button class="modal-link" data-modal-target="user_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="delete_user-modal"><i class='bx bx-trash mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Hector</span></td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">01-07-2024</td>
                            <td class="p-3"><span class="bg-gray-300 text-gray-900 py-1 px-3 rounded-full w-28 text-center inline-block font-semibold">Desactivado</span></td>
                            <td class="p-3">
                                <span style="color: #F5F5DC;">
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