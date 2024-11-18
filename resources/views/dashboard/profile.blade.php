<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cee8dd5548.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Mi perfil</title>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Sidebar -->
    <x-dashboard_sidebar />

    <style>
        .compressed .sidebar-text {
            display: none;
        }
    </style>

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-8 transition-all duration-300">

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
                <div id="info-personal" class="grid grid-cols-2 gap-4 text-gray-600">
                    <p><span class="font-semibold">Nombres: </span><span id="nombres-text">WILVER ALEXIS</span></p>
                    <p><span class="font-semibold">Apellidos: </span><span id="apellidos-text">VERDUZCO LÓPEZ</span></p>
                    <p><span class="font-semibold">Correo: </span><span id="correo-text">wverduzcoucol.mx</span></p>
                    <p><span class="font-semibold">Número de teléfono: </span><span id="telefono-text">+543142413571</span></p>
                    <p><span class="font-semibold">Rol: </span><span id="rol-text">Beneficiario</span></p>
                    <p><span class="font-semibold">Contraseña: </span><span id="password-text">contraseña123</span></p>
                </div>
                <p class="text-blue-500 text-sm ml-auto block text-right mt-4">
                    VER <a href="#" data-modal-target="terms-modal" class="text-customGreen modal-link">TÉRMINOS Y CONDICIONES</a>
                </p>
            </div>

            <!-- Address Information -->
            <div id="address-info" class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-gray-700">DIRECCIÓN PERSONAL</h3>
                    <button class="text-blue-500 flex items-center space-x-1 modal-link" data-modal-target="address-modal">
                        <i class='bx bx-edit'></i>Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4 text-gray-600">
                    <p><span class="font-semibold">Código postal: </span><span id="cp-text">28219</span></p>
                    <p><span class="font-semibold">Estado: </span><span id="estado-text">COLIMA</span></p>
                    <p><span class="font-semibold">Municipio: </span><span id="municipio-text">MANZANILLO</span></p>
                    <p><span class="font-semibold">Localidad: </span><span id="localidad-text">MANZANILLO</span></p>
                    <p><span class="font-semibold">Colonia: </span><span id="colonia-text">Nápoles</span></p>
                    <p><span class="font-semibold">Calle: </span><span id="calle-text">Avenida Insurgentes Sur</span></p>
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

    //Estas son los scripts de las dos
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
</section>

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
