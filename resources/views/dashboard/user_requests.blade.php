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
            <h2 class="merriweather-bold text-3xl text-customGreen font-bold mb-4">Solicitudes de usuarios</h2>
            <div class="mt-8 bg-customLighterGray p-6 shadow rounded-lg">
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-customDarkGray">
                            <th class="p-3 text-customBeige">Correo</th>
                            <th class="p-3 text-customBeige">Rol solicitado</th>
                            <th class="p-3 text-customBeige">Fecha de solicitud</th>
                            <th class="p-3 text-customBeige">Información</th>
                            <th class="p-3 text-customBeige">Solicitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                            <tr class="border-b border-black bg-customLightGray">
                                <td class="p-3 text-customBeige">{{ $request->email }}</td>
                                <td class="p-3" style="color: {{ $request->rol == 'Voluntario' ? '#4CAF50' : '#FF8C00' }};">
                                    {{ $request->rol }}
                                </td>
                                <td class="p-3 text-customBeige">{{ \Carbon\Carbon::parse($request->created_at)->format('d-m-Y') }}</td>
                                <td class="p-3 text-center align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="cursor-pointer w-6 h-6 fill-[#4E97D1] mx-auto" onclick="openInfoModal({{ $request->user_id }}, '{{ $request->rol }}')">
                                        <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                </td>
                                <td class="p-3 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" onclick="openAcceptModal({{ $request->user_id }}, '{{ $request->rol }}')" class="cursor-pointer w-6 h-6 fill-customGreen mx-4">
                                        <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" onclick="openDeclineModal({{ $request->user_id }}, '{{ $request->rol }}')" class="cursor-pointer w-6 h-6 fill-[#FF0000] mr-4">
                                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                                    </svg>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-3 text-customBeige">No hay solicitudes.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </section>

        <!-- Modal de botón para ver la información personal del usuario -->
    <div id="user_info-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
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
    <div id="acept_user-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">¿Deseas aceptar a este usuario?</h2>
            <p class="text-gray-700 mb-4">Aquí van las 2 opciones</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para borrar un usuario -->
    <div id="delete_user-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">¿Deseas eliminar a este usuario?</h2>
            <p class="text-gray-700 mb-4">Aquí van las 2 opciones</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para ver la información de la solicitud -->
    <div id="infoModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-customDarkGray p-6 rounded-lg shadow-lg w-96 relative">
            <!-- Botón para cerrar el modal -->
            <button onclick="closeInfoModal()" class="absolute top-2 right-4 text-white font-bold text-xl">×</button>

            <!-- Contenido del modal -->
            <h2 class="text-lg font-bold text-customGreen mb-2">Información de la solicitud</h2>
            <p class="text-customBeige font-semibold mb-4">Fecha de nacimiento: <span id="modalBirthdate" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Nivel de educación: <span id="modalEducation" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Dirección: <span id="modalAddress" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-4">Teléfono: <span id="modalPhone" class="text-gray-400"></span></p>
            <p class="text-customBeige font-semibold mb-2">INE/Guardian INE:</p>
            <img id="modalINEImage" src="" alt="INE/DNI" class="w-full h-auto rounded shadow-md">
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
        const requests = @json($requests);
    </script>

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