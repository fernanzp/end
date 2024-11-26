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

        <x-navbar_configuration />
        
        <main class="mt-8">
            <h2 class="text-2xl font-bold text-customGreen mb-4">Solicitudes de programas</h2>
            <div class="mt-8 bg-customLighterGray p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold text-customGreen mb-4 text-center">Nuevos programas solicitado</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-customDarkGray">
                            <th class="p-3 text-customBeige">Nombre del programa</th>
                            <th class="p-3 text-customBeige">Tipo de programa</th>
                            <th class="p-3 text-customBeige">Rol del solicitado</th>
                            <th class="p-3 text-customBeige">Fecha de solicitud</th>
                            <th class="p-3 text-customBeige">Estado del programa</th>
                            <th class="p-3 text-customBeige">CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Unidos por la esperanza</span></td>
                            <td class="p-3 text-customBeige">Educativo</td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">01-08-2025</td>
                            <td class="p-3"><span class="bg-gray-300 text-gray-900 w-28 py-1 px-3 rounded-full inline-block font-semibold">Pendiente</span></td>
                            <td class="p-3">
                                <span style="color: #F5F5DC;">
                                    <button class="modal-link" data-modal-target="acept_program-modal"><i class='bx bx-check mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="cancel_program-modal"><i class='bx bx-x mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="program_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Curso de lenguaje español</span></td>
                            <td class="p-3 text-customBeige">Educativo</td>
                            <td class="p-3 text-customBeige">Voluntario</td>
                            <td class="p-3 text-customBeige">05-010-2025</td>
                            <td class="p-3 "><span class="bg-green-300 text-green-900 w-28 py-1 px-3 rounded-full inline-block font-semibold">Aceptado</span></td>
                            <td class="p-3">
                                <span style="color: #F5F5DC;">
                                <button class="modal-link" data-modal-target="acept_program-modal"><i class='bx bx-check mx-2'></i></button>
                                <button class="modal-link" data-modal-target="cancel_program-modal"><i class='bx bx-x mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="program_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Unidos por la esperanza</span></td>
                            <td class="p-3 text-customBeige">Educativo</td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">01-08-2025</td>
                            <td class="p-3"><span class="bg-red-300 text-red-900 w-28 py-1 px-3 rounded-full inline-block font-semibold">Rechazado</span></td>
                            <td class="p-3">
                                <span style="color: #F5F5DC;">
                                <button class="modal-link" data-modal-target="acept_program-modal"><i class='bx bx-check mx-2'></i></button>
                                <button class="modal-link" data-modal-target="cancel_program-modal"><i class='bx bx-x mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="program_info-modal"><i class='bx bxs-user-detail mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </section>

    <!-- Modal de botón para ver la información del programa -->
    <div id="program_info-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Usuario</h2>
            <form id="edit-address-form" class="space-y-4">
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
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para borrar un usuario -->
    <div id="acept_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">¿Deseas eliminar a este usuario?</h2>
            <p class="text-gray-700 mb-4">Aquí van las 2 opciones</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para borrar un usuario -->
    <div id="cancel_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">¿Deseas eliminar a este usuario?</h2>
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