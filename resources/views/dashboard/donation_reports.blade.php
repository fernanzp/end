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

        /* Asegurar que el canvas no sobresalga */
        .canvas-container {
            position: relative;
            width: 100%;
            height: 100%;
        }
        canvas {
            display: block;
            width: 100% !important;
            height: 100% !important;
        }
    </style>

    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-8 transition-all duration-300">

        <x-navbar_configuration />
        
        <main class="mt-8">
            <div class="flex items-center justify-between mb-4 mt-7">
                <h1 class="text-2xl font-bold text-customGreen">Programas</h1>
                <!-- <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 modal-link" data-modal-target="make_a_program-modal">
                    <i class='bx bx-plus w-4 h-4'></i> Crear programa
                </button> -->
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 modal-link" data-modal-target="request_a_program-modal">
                    <i class='bx bx-plus w-4 h-4'></i> Generar informe donativo
                </button>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- 4 Main Cards -->
                <div class="grid grid-cols-2 gap-6 lg:col-span-2">
                    <!-- Card 1 -->
                    <div class="relative bg-customLighterGray p-6 rounded-xl shadow-md">
                        <div class="absolute top-3 right-3 bg-green-500 text-white text-sm font-semibold px-2 py-1 rounded-full">
                            +2.08%
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-customLightGray text-customGreen rounded-lg p-4 w-16 h-16 flex justify-center items-center mr-4">
                                <i class="bx bx-bar-chart-alt-2 text-2xl"></i>
                            </div>
                            <p class="text-lg font-medium text-customBeige">Donaciones totales</p>
                        </div>
                        <div>
                            <h2 class="text-4xl font-bold text-customGreen">$612,917</h2>
                            <p class="text-sm text-customBeige">Monto recaudado respecto al mes anterior.</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="relative bg-customLighterGray p-6 rounded-xl shadow-md">
                        <div class="absolute top-3 right-3 bg-green-500 text-white text-sm font-semibold px-2 py-1 rounded-full">
                            +12.4%
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-customLightGray text-customGreen rounded-lg p-4 w-16 h-16 flex justify-center items-center mr-4">
                                <i class="bx bx-cart text-2xl"></i>
                            </div>
                            <p class="text-lg font-medium text-customBeige">Total de programas creados</p>
                        </div>
                        <div>
                            <h2 class="text-4xl font-bold text-customGreen">34,760</h2>
                            <p class="text-sm text-customBeige">Crecimiento mensual.</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="relative bg-customLighterGray p-6 rounded-xl shadow-md">
                        <div class="absolute top-3 right-3 bg-red-500 text-white text-sm font-semibold px-2 py-1 rounded-full">
                            -2.08%
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-customLightGray text-customGreen rounded-lg p-4 w-16 h-16 flex justify-center items-center mr-4">
                                <i class="bx bx-user text-2xl"></i>
                            </div>
                            <p class="text-lg font-medium text-customBeige">Voluntarios activos</p>
                        </div>
                        <div>
                            <h2 class="text-4xl font-bold text-customGreen">14,987</h2>
                            <p class="text-sm text-customBeige">Personas que impartieron clases o brindaron apoyo presencial.</p>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="relative bg-customLighterGray p-6 rounded-xl shadow-md">
                        <div class="absolute top-3 right-3 bg-green-500 text-white text-sm font-semibold px-2 py-1 rounded-full">
                            +12.1%
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-customLightGray text-customGreen rounded-lg p-4 w-16 h-16 flex justify-center items-center mr-4">
                                <i class="bx bx-package text-2xl"></i>
                            </div>
                            <p class="text-lg font-medium text-customBeige">Beneficiarios atendidos</p>
                        </div>
                        <div>
                            <h2 class="text-4xl font-bold text-customGreen">12,987</h2>
                            <p class="text-sm text-customBeige">Personas que participaron en los programas.</p>
                        </div>
                    </div>
                </div>

                <!-- Product Statistics -->
                <div class="bg-customLighterGray rounded-xl shadow-md p-6 flex flex-col justify-between" style="height: 500px;">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <p class="text-sm text-customGreen">Estadísitcas del impacto educativo</p>
                            <p class="text-xl font-semibold text-customBeige">Crecimiento mensual en programas exitosos:</p>
                        </div>
                        <button class="bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md flex items-center">
                            Today <span class="ml-2">▼</span>
                        </button>
                    </div>
                    <div class="flex flex-col-reverse lg:flex-row w-full h-full">
                        <div class="canvas-container relative w-full lg:w-2/3" style="height: 100%; max-height: 350px;">
                            <canvas id="productChart" class="w-full h-full"></canvas>
                            <!-- <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <p class="text-2xl font-semibold text-gray-800">9,829</p>
                                <p class="text-sm text-green-500">+5.34%</p>
                                <p class="text-xs text-gray-400">Products Sales</p>
                            </div> -->
                        </div>
                        <div class="flex flex-col lg:flex-row justify-around items-center mt-4 lg:mt-0 lg:w-1/3 space-y-4 lg:space-y-0">
                            <div class="text-center mb-1">
                                <p class="text-sm">📚 <span class="font-medium text-customBeige">Educativo</span></p>
                                <p class="text-green-500 text-sm">+1.8%</p>
                                <p class="text-gray-400 text-sm">2,487</p>
                            </div>
                            <div class="text-center mb-1">
                                <p class="text-sm">💰 <span class="font-medium text-customBeige">Económico</span></p>
                                <p class="text-green-500 text-sm">+2.3%</p>
                                <p class="text-gray-400 text-sm">1,828</p>
                            </div>
                            <div class="text-center mb-1">
                                <p class="text-sm">❤️ <span class="font-medium text-customBeige">Caritativo</span></p>
                                <p class="text-red-500 text-sm">-1.04%</p>
                                <p class="text-gray-400 text-sm">1,463</p>
                            </div>
                            <div class="text-center mb-1">
                                <p class="text-sm">🤝 <span class="font-medium text-customBeige">Inclusivo</span></p>
                                <p class="text-green-500 text-sm">+1.8%</p>
                                <p class="text-gray-400 text-sm">2,487</p>
                            </div>
                            <div class="text-center mb-1">
                                <p class="text-sm">🛠️ <span class="font-medium text-customBeige">Capacitación</span></p>
                                <p class="text-green-500 text-sm">+2.3%</p>
                                <p class="text-gray-400 text-sm">1,828</p>
                            </div>
                            <!-- <div class="text-center">
                                <p class="text-sm">⭐ <span class="font-medium">Otro</span></p>
                                <p class="text-red-500 text-sm">-1.04%</p>
                                <p class="text-gray-600 text-sm">1,463</p>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- Customer Habits -->
                <div class="lg:col-span-3 flex gap-6">
                    <div class="bg-customLighterGray rounded-xl shadow-md p-6 w-full" style="height: 460px;">
                        <!-- Título -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-lg font-medium text-customGreen">Hábitos de participación</p>
                                <p class="text-sm text-customBeige">Programas seguidos</p>
                            </div>
                            <!-- Botones de intervalo -->
                            <div class="flex space-x-2">
                                <button onclick="updateChart('1W')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1W</button>
                                <button onclick="updateChart('1M')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1M</button>
                            </div>
                        </div>
                        <!-- Contenedor del gráfico -->
                        <div class="relative w-full" style="height: calc(100% - 50px);">
                            <!-- Ajusta altura del gráfico -->
                            <canvas id="habitsChart" class="absolute top-0 left-0 w-full h-full"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de Donaciones recientes -->
            <div class="mt-6 bg-customLighterGray p-6 shadow rounded-lg">
                <h3 class="text-lg text-customGreen font-semibold mb-4 text-center">Donaciones recientes</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-customDarkGray">
                            <th class="p-3 text-customBeige">Nombre</th>
                            <th class="p-3 text-customBeige">Cantidad</th>
                            <th class="p-3 text-customBeige">Fecha de la donación</th>
                            <th class="p-3 text-customBeige">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Derick Fernandez</span></td>
                            <td class="p-3 text-customBeige">$200</td>
                            <td class="p-3 text-customBeige">01-10-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-green-300 text-green-900 w-28 py-1 px-3 rounded-full inline-block font-semibold">Aceptado</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Fernado Piper</span></td>
                            <td class="p-3 text-customBeige">$2000</td>
                            <td class="p-3 text-customBeige">10-10-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-green-300 text-green-900 w-28 py-1 px-3 rounded-full inline-block font-semibold">Aceptado</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Hector</span></td>
                            <td class="p-3 text-customBeige">$10 bolivares</td>
                            <td class="p-3 text-customBeige">01-10-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-red-300 text-red-900 w-28 py-1 px-3 rounded-full inline-block font-semibold">Cancelado</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Customer Habits Chart
        const habitsCtx = document.getElementById('habitsChart').getContext('2d');
        new Chart(habitsCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'Voluntarios',
                        data: [20000, 23000, 30000, 43787, 39000, 25000, 28000],
                        backgroundColor: '#B0C4DE',
                        borderColor: '#4682B4',
                        borderWidth: 1,
                    },
                    {
                        label: 'Beneficiarios',
                        data: [15000, 18000, 25000, 39784, 37000, 23000, 27000],
                        backgroundColor: '#22c55e',
                        borderColor: '#4682B4',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 5,
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#ECDFCC', // Cambia el color del texto de las leyendas
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#ECDFCC', // Cambia el color de los labels del eje x
                        },
                    },
                    y: {
                        ticks: {
                            color: '#ECDFCC', // Cambia el color de los labels del eje y
                        },
                        beginAtZero: true,
                    },
                },
            },
        });

        // Product Statistics Chart
        const productCtx = document.getElementById('productChart').getContext('2d');
        new Chart(productCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
            label: 'Programas',
            data: [10, 15, 20, 25, 30, 35, 40],
            backgroundColor: 'rgba(0, 123, 255, 0.3)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                position: 'top',
                labels: {
                    color: '#ECDFCC',
                },
            }
            },
            scales: {
                    x: {
                        ticks: {
                            color: '#ECDFCC', // Cambia el color de los labels del eje x
                        },
                    },
                    y: {
                        ticks: {
                            color: '#ECDFCC', // Cambia el color de los labels del eje y
                        },
                        beginAtZero: true,
                    },
                },
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