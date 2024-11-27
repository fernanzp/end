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
                                <button class="modal-link" data-modal-target="acceptModal"><i class='bx bx-check mx-2'></i></button>
                                <button class="modal-link" data-modal-target="declineModal"><i class='bx bx-x mx-2'></i></button>
                                    <button class="modal-link" data-modal-target="infoModal"><i class='bx bxs-user-detail mx-2'></i></button>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </section>

    <!-- Modal de botón para ver la información del programa -->
    <div id="infoModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-customDarkGray p-6 rounded-lg shadow-lg w-96 relative">
            <!-- Botón para cerrar el modal -->
            <button onclick="closeInfoModal()" class="absolute top-2 right-4 text-white font-bold text-xl">×</button>

            <!-- Contenido del modal -->
            <h2 class="text-lg font-bold text-customGreen mb-2">Información de la solicitud</h2>
            <p class="text-customBeige font-semibold mb-4">Título del programa: <span id="modalTitle" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Descripción: <span id="modalShortDescription" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Tipo de programa: <span id="modalCategory" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Fecha de inicio: <span id="modalStartDate" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Fecha de finalización: <span id="modalEndDate" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-2">Ubicación</p>
            <img id="modalLatitudeLongitude" src="" alt="Ubicación del lugar" class="w-full h-auto rounded shadow-md">
            <p class="text-customBeige font-semibold mb-4">Dirección: <span id="modalPlace" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Modalidad: <span id="modalModality" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Horario: <span id="modalSchedule" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Edad: <span id="modalAge" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Capacidad de beneficiarios: <span id="modalBeneficiaryCapacity" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Capacidad de voluntarios: <span id="modalVolunteerCapacity" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Objetivo del programa: <span id="modalObjetive" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Listado de actividades: <span id="modalContents" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Recursos estimados: <span id="modalFinancing" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-2">Imágen del programa</p>
            <img id="modalImg" src="" alt="Imagen referente al programa" class="w-full h-auto rounded shadow-md">
        </div>
    </div>

        <!-- Modal de confirmación para aceptar una solicitud -->
        <div id="acceptModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-customDarkGray p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-bold text-customGreen">Confirmación</h2>
            <p class="mt-2 text-customBeige">
                ¿Está seguro de aceptar al usuario como beneficiario o voluntario? Por favor, confirme que ha verificado los datos del usuario.
            </p>
            <form method="POST" action="{{ route('aprobar.solicitud') }}">
                @csrf
                <input type="hidden" name="user_id" id="acceptUserId">
                <input type="hidden" name="rol" id="acceptRol">
                <!-- Botónes de Cancelar y Aceptar -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <button type="button" onclick="document.getElementById('acceptModal').classList.add('hidden')" 
                            class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-transparent text-customGreen font-bold py-2 px-4 rounded border-customGreen border-4 hover:text-customLighterGray hover:bg-customGreen transition-colors duration-300 ease-in-out">
                        Aceptar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmación para rechazar una solicitud -->
    <div id="declineModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-customDarkGray p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-bold text-[#FF0000]">Rechazar Solicitud</h2>
            <p class="mt-2 text-customBeige">
                ¿Está seguro de rechazar la solicitud del usuario para ser beneficiario o voluntario? Por favor, confirme que ha revisado los datos del usuario.
            </p>
            <form method="POST" action="{{ route('rechazar.solicitud') }}">
                @csrf
                <input type="hidden" name="user_id" id="declineUserId">
                <input type="hidden" name="rol" id="declineRol">
                <!-- Botónes de Cancelar y Rechazar -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <button type="button" onclick="document.getElementById('declineModal').classList.add('hidden')" 
                            class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-transparent text-[#FF0000] font-bold py-2 px-4 rounded border-[#FF0000] border-4 hover:text-customLighterGray hover:bg-[#FF0000] transition-colors duration-300 ease-in-out">
                        Rechazar
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
        function openInfoModal(userId, rol) {
            // Busca la información desde el array de solicitudes (requests).
            const request = requests.find(req => req.user_id === userId && req.rol.toLowerCase() === rol.toLowerCase());

            if (request) {
                // Actualiza los datos en el modal
                document.getElementById('modalBirthdate').textContent = request.birthdate || 'N/A';
                document.getElementById('modalEducation').textContent = request.education_level || 'N/A';
                document.getElementById('modalAddress').textContent = request.address || 'N/A';
                document.getElementById('modalPhone').textContent = request.phone || 'N/A';

                // Generar la ruta correcta de la imagen
                const ineImage = document.getElementById('modalINEImage');
                if (request.guardian_ine) {
                    ineImage.src = "{{ asset('') }}" + request.guardian_ine; // Usa asset() para generar la ruta
                } else {
                    ineImage.src = ""; // Vacía el src si no hay imagen
                }
            }

            // Muestra el modal
            document.getElementById('infoModal').classList.remove('hidden');
        }

        function closeInfoModal() {
            document.getElementById('infoModal').classList.add('hidden');
        }

        // Cerrar el modal si el usuario hace clic fuera de él
        window.onclick = function(event) {
            var modal = document.getElementById('infoModal');
            if (event.target === modal) {
                closeInfoModal();
            }
        }
    </script>

    <script>
        function openAcceptModal(userId, rol) {
            document.getElementById('acceptUserId').value = userId;
            document.getElementById('acceptRol').value = rol.toLowerCase(); // Pasa el rol como 'beneficiario' o 'voluntario'
            document.getElementById('acceptModal').classList.remove('hidden');
        }
    </script>

    <script>
        function openDeclineModal(userId, rol) {
            document.getElementById('declineUserId').value = userId;
            document.getElementById('declineRol').value = rol.toLowerCase();
            document.getElementById('declineModal').classList.remove('hidden');
        }
    </script>
</body>
</html>