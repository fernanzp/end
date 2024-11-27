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
        
        /* Estilo para la barra de desplazamiento */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #a3a3a3;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #71717a;
        }
    </style>

    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-8 transition-all duration-300">

        <x-navbar_configuration />
        
        <main class="mt-8">
            <div class="container mx-auto">
                <!-- Encabezado del Reporte -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-center text-gray-800">Reporte de Programas</h1>
                    <p class="text-center text-gray-600">Resumen semanal de programas realizados por Education Non-Disparity</p>
                </div>
        
                <!-- Resumen General -->
                <div class="grid grid-cols-5 gap-4 mb-8">
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Programas finalizados</h2>
                        <p class="text-3xl font-bold text-green-500">0</p>
                        <p class="text-sm text-green-500">+0% respecto al periodo anterior</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Voluntarios inscritos</h2>
                        <p class="text-3xl font-bold text-blue-500">0</p>
                        <p class="text-sm text-blue-500">+8% respecto al periodo anterior</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Beneficiarios inscritos</h2>
                        <p class="text-3xl font-bold text-green-500">0</p>
                        <p class="text-sm text-green-500">+12% respecto al periodo anterior</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Fondos Recaudados</h2>
                        <p class="text-3xl font-bold text-yellow-500">$0</p>
                        <p class="text-sm text-yellow-500">+20% respecto al periodo anterior</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Actividades realizadas</h2>
                        <p class="text-3xl font-bold text-purple-500">0</p>
                        <p class="text-sm text-purple-500">+5% respecto al periodo anterior</p>
                    </div>
                </div>
        
                <!-- Detalle de Actividades -->
                <div class="grid grid-cols-[1.5fr_4fr_1.5fr] gap-4 mb-8">
                    <!-- Informe Regional -->
                    <div class="bg-white p-4 rounded shadow flex flex-col h-[600px]">
                        <h3 class="text-lg font-semibold mb-4">Actividades por programas</h3>
                        <div class="mb-4 overflow-y-auto custom-scrollbar">
                            <div class="bg-green-100 text-green-500 p-2 rounded mb-2">
                                <strong>Capacitación Docente</strong>
                            </div>
                            <div class="bg-yellow-100 text-yellow-500 p-2 rounded mb-2">
                                <strong>Entrega de Materiales</strong>
                            </div>
                            <div class="bg-red-100 text-red-500 p-2 rounded mb-2">
                                <strong>Infraestructura Necesaria</strong>
                            </div>
                            <div class="bg-green-100 text-green-500 p-2 rounded mb-2">
                                <strong>Reclutamiento de Voluntarios</strong>
                            </div>
                            <div class="bg-yellow-100 text-yellow-500 p-2 rounded mb-2">
                                <strong>Expansión de Programas</strong>
                            </div>
                        </div>
                    </div>
        
                    <!-- Espacio para el Mapa -->
                    <div class="bg-white p-4 rounded shadow flex items-center justify-center h-[600px]">
                        <div class="h-full w-full bg-gray-300 rounded flex items-center justify-center">
                            <p class="text-gray-500">Mapa de Impacto Regional</p>
                        </div>
                    </div>
            
                    <!-- Gráfica de Financiamiento -->
                    <div class="bg-white p-4 rounded shadow flex flex-col h-[600px]">
                        <h3 class="text-lg font-semibold mb-4">Tipos de programas</h3>
                        <div class="h-full w-full flex items-center justify-center">
                            <canvas id="fundChart"></canvas>
                        </div>
                        <div class="mt-4">
                            <p class="flex justify-between text-sm"><span>Educativos</span> <span class="text-green-500">40%</span></p>
                            <p class="flex justify-between text-sm"><span>Económicos</span> <span class="text-blue-500">30%</span></p>
                            <p class="flex justify-between text-sm"><span>Caritativos</span> <span class="text-yellow-500">20%</span></p>
                            <p class="flex justify-between text-sm"><span>Inclusivos</span> <span class="text-red-500">10%</span></p>
                            <p class="flex justify-between text-sm"><span>Capacitativos</span> <span class="text-red-500">10%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Chart.js para la gráfica de distribución de fondos
        const ctx = document.getElementById('fundChart').getContext('2d');
        new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Educativos', 'Económicos', 'Caritativos', 'Inclusivos', 'Capacitativos'],
            datasets: [{
            label: 'Distribución de Fondos',
            data: [40, 30, 20, 10],
            backgroundColor: [
                'rgba(75, 192, 192, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(255, 99, 132, 0.8)'
            ],
            hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            }
            }
        }
        });
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
</body>
</html>