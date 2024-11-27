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
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-4 mt-7">
            <h1 class="merriweather-bold text-3xl text-customGreen font-bold mb-4">Programas</h1>
            <button class="flex items-center justify-center px-4 py-2 bg-transparent text-customGreen border-customGreen border-4 rounded-lg transition-all duration-300 hover:bg-customGreen hover:text-customDarkGray modal-link" data-modal-target="request_a_program-modal">
                Crear un nuevo programa <i class='ml-2 bx bx-plus w-4 h-4'></i>
            </button>
        </div>

        
        <!-- Filters -->
        <div class="flex gap-4 mb-6">
            <form method="GET" action="{{ url('/configuration/programs') }}" class="w-full flex gap-2">
                <!-- Barra de búsqueda -->
                <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}" class="p-3 border bg-customLighterGray border-none text-customBeige rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 flex-1" onchange="this.form.submit()">
        
                <!-- Categoría -->
                <select name="category" class="p-3 border bg-customLighterGray border-none text-customBeige rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" onchange="this.form.submit()">
                    <option value="" {{ request('category') ? '' : 'selected' }}>Todos</option>
                    <option value="educativo" {{ request('category') == 'educativo' ? 'selected' : '' }}>Educativo</option>
                    <option value="económico" {{ request('category') == 'económico' ? 'selected' : '' }}>Económico</option>
                    <option value="caritativo" {{ request('category') == 'caritativo' ? 'selected' : '' }}>Caritativo</option>
                    <option value="inclusivo" {{ request('category') == 'inclusivo' ? 'selected' : '' }}>Inclusivo</option>
                    <option value="capacitación" {{ request('category') == 'capacitación' ? 'selected' : '' }}>Capacitación</option>
                    <option value="otro" {{ request('category') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </form>
        </div>

        <!-- Program List -->
        <div class="space-y-6 my-5">
            <!-- Grid for cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($programs as $program)
                    <x-program-card :program="$program" />
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6 flex justify-center">
                <div class="mt-6 flex justify-center">
                    {{ $programs->links() }}
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
