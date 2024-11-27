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
    <link rel="stylesheet" href="style.css">

    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-6 transition-all duration-300">

        <x-navbar_configuration />

        <main class="mt-8">
            <div class="bg-customLighterGray p-6 rounded-lg shadow-lg">
                <header class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-4">
                        <img src="{{ auth()->user()->profile_img }}" alt="Foto de perfil" class="w-12 h-12 rounded-full border-2 border-none">
                        <div>
                            <h2 class="text-lg font-bold text-customGreen">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</h2>
                            <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </header>

                <!-- Buscador -->
                <div class="mb-6 relative">
                    <label for="searchBar" class="block text-sm text-customBeige font-semibold mb-2">Buscar usuario:</label>
                    <div class="flex items-center">
                        <input 
                            type="text" 
                            id="searchBar" 
                            placeholder="Escribe un nombre..." 
                            class="w-full bg-customLightGray border border-customGreen rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-customGreen transition-all"
                        />
                        <button 
                            id="searchButton" 
                            class="ml-2 bg-customLightGray text-white px-4 py-2 rounded-lg hover:bg-customDarkGray transition hidden">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <div id="usersList" class="space-y-4">
                    <!-- Resultados de búsqueda dinámicos aquí -->
                </div>
                
            </div>
        </main>
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
    <script src="{{ asset('js/chat.js') }}"></script>
</body>
</html>