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
            <!-- Bienvenida y estadísticas -->
            <h2 class="text-2xl font-bold text-customGreen">Resumen del usuario</h2>
            <div class="flex flex-col-2 space-x-6 justify-between items-center mt-5">
                <!-- Contenedor principal a la izquierda -->
                <div class="bg-customLighterGray shadow-md rounded-lg py-12 px-4 w-full mb-4 mr-0">
                    <h1 class="text-3xl font-bold text-customBeige lg:text-left">Bienvenido de vuelta, Voluntario</h1>
                </div>

                <!-- Estadística de programas -->
                <div class="flex flex-col-2 space-x-6">
                    <div class="bg-customLighterGray text-center shadow-md rounded-lg w-32 h-32 mb-4 flex flex-col justify-center items-center">
                        <p class="text-5xl font-bold text-customOrange">14</p>
                        <p class="text-customBeige font-medium text-md">Programas asistidos</p>
                    </div>
                    <div class="bg-customLighterGray text-center shadow-md rounded-lg w-32 h-32 mb-4 flex flex-col justify-center items-center">
                        <p class="text-5xl font-bold text-customOrange">20</p>
                        <p class="text-customBeige font-medium text-md">Programas en curso inscritos</p>
                    </div>
                </div>
            </div>
            
            <!-- Actividades y recomendaciones -->
            <div class="lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <div class="flex-1 bg-customLighterGray shadow-md rounded-lg p-6 mt-6">
                    <h2 class="text-2xl font-bold text-customGreen mb-6">Programas inscritos</h2>
                    <div class="flex space-x-6 mb-6">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Todas las programas</button>
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Los más recientes</button>
                    </div>
                    <div class="space-y-4">
                        <!-- Actividad -->
                        <div class="flex items-center p-4 bg-customLightGray rounded-lg shadow-sm hover:shadow-md">
                            <img src="https://via.placeholder.com/60" alt="Actividad" class="w-14 h-14 rounded-full object-cover mr-4">
                            <div>
                                <h3 class="text-lg font-semibold text-customBeige">Educación para el futuro: Juntos por un cambio</h3>
                                <p class="text-sm text-gray-500">Miércoles 14 Sept, 2024 - 08:00PM</p>
                            </div>
                            <button class="ml-auto text-customGreen font-semibold hover:underline">Ver más</button>
                        </div>
                        <div class="flex items-center p-4 bg-customLightGray rounded-lg shadow-sm hover:shadow-md">
                            <img src="https://via.placeholder.com/60" alt="Actividad" class="w-14 h-14 rounded-full object-cover mr-4">
                            <div>
                                <h3 class="text-lg font-semibold text-customBeige">Educación para el futuro: Juntos por un cambio</h3>
                                <p class="text-sm text-gray-500">Miércoles 14 Sept, 2024 - 08:00PM</p>
                            </div>
                            <button class="ml-auto text-customGreen font-semibold hover:underline">Ver más</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-2 lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6 mt-4">
                <div class="bg-customLighterGray p-6 rounded-lg shadow-md w-1/2 flex flex-col items-center justify-center mt-6">
                    <div class="relative bg-customLighterGray shadow-md rounded-lg pt-12 h-auto" style="max-width: 100%; width: 600px; height: 300px;">
                        <canvas id="lineChart"></canvas>
                        <div class="absolute top-4 right-4 flex flex-wrap md:flex-nowrap space-x-2 md:space-x-2 md:space-y-0 mb-4 md:mb-0 md:top-4 md:right-4 md:flex-row">
                            <button onclick="updateChart('1W')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1W</button>
                            <button onclick="updateChart('1M')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1M</button>
                            <button onclick="updateChart('1Y')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1Y</button>
                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-customLighterGray shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-customGreen mb-6">Programas recomendados</h2>
                    <div class="flex space-x-6 mb-6">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Todas las programas</button>
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Los más recientes</button>
                    </div>
                    <div class="space-y-4">
                        <!-- Actividad -->
                        <div class="flex items-center p-4 bg-customLightGray rounded-lg shadow-sm hover:shadow-md">
                            <img src="https://via.placeholder.com/60" alt="Actividad" class="w-14 h-14 rounded-full object-cover mr-4">
                            <div>
                                <h3 class="text-lg font-semibold text-customBeige">Educación para el futuro: Juntos por un cambio</h3>
                                <p class="text-sm text-gray-500">Miércoles 14 Sept, 2024 - 08:00PM</p>
                            </div>
                            <button class="ml-auto text-customGreen font-semibold hover:underline">Ver más</button>
                        </div>
                        <div class="flex items-center p-4 bg-customLightGray rounded-lg shadow-sm hover:shadow-md">
                            <img src="https://via.placeholder.com/60" alt="Actividad" class="w-14 h-14 rounded-full object-cover mr-4">
                            <div>
                                <h3 class="text-lg font-semibold text-customBeige">Educación para el futuro: Juntos por un cambio</h3>
                                <p class="text-sm text-gray-500">Miércoles 14 Sept, 2024 - 08:00PM</p>
                            </div>
                            <button class="ml-auto text-customGreen font-semibold hover:underline">Ver más</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let chartLeads;
        const ctx = document.getElementById('lineChart').getContext('2d');
        const dataSets = {
            '1W': { 
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'], 
                datasets: [
                    { 
                        label: 'Usuario', 
                        data: [1300, 1210, 520, 1330, 1110, 1350, 1360], 
                        borderColor: 'rgba(75, 192, 192, 1)', 
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)' 
                    },
                ] 
            },
            '1M': { 
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'], 
                datasets: [
                    {
                        label: 'Tipos de usuarios', 
                        data: [1280, 1300, 1320, 1340], 
                        borderColor: 'rgba(75, 192, 192, 1)', 
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)'
                    }
                ]
            },
            '1Y': { 
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'], 
                datasets: [
                    {
                        label: 'Tipos de usuarios', 
                        data: [1200, 1250, 1300, 1500, 1700, 2000, 2100, 2200, 2300, 2145, 2213, 2531], 
                        borderColor: 'rgba(75, 192, 192, 1)', 
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)'
                    }
                ]
            }
        };

        let currentInterval = '1W';
        const chartConfig = {
            type: 'line',
            data: {
                labels: dataSets[currentInterval].labels,
                datasets: dataSets[currentInterval].datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `$${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tiempo'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Precio ($)'
                        },
                        beginAtZero: false
                    }
                }
            }
        };

        let lineChart = new Chart(ctx, chartConfig);

        function updateChart(interval) {
            currentInterval = interval;
            lineChart.data.labels = dataSets[interval].labels;
            lineChart.data.datasets = dataSets[interval].datasets;
            lineChart.update();
        }
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