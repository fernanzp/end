<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cee8dd5548.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Dashboard</title>
</head>
<body class=" bg-gray-100 font-sans antialiased">

    <style>
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

        <!-- NAVBAR -->
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
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main class="mt-8">
            <div class="head-title flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">Panel de control</h1>
                    <span class="mx-2 mt-1 text-gray-400"> &gt; </span>
                    <p class="text-gray-500 mt-1">Donaciones recientes</p>
                    <span class="mx-2 mt-1 text-gray-400"> &gt; </span>
                    <p class="text-gray-500 mt-1">Nuevos usuarios</p>
                    <span class="mx-2 mt-1 text-gray-400"> &gt; </span>
                    <p class="text-gray-500 mt-1">Nuevos programas solicitados</p>
                </div>
            </div>

            <!-- Caja de Informacion -->
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class="fa-solid fa-users text-blue-500 text-2xl"></i>
                    <div class="ml-4">
                        <p>Total de usuarios</p>
                        <h3 class="text-xl font-semibold">1020</h3>
                    </div>
                </li>
                <li class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class='bx bxs-group text-blue-500 text-2xl'></i>
                    <div class="ml-4">
                        <p>Voluntarios</p>
                        <h3 class="text-xl font-semibold">203</h3>
                    </div>
                </li>
                <li class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class="fa-solid fa-hand-holding-heart text-blue-500 text-2xl"></i>
                    <div class="ml-4">
                        <p>Total de donaciones</p>
                        <h3 class="text-xl font-semibold">$2543</h3>
                    </div>
                </li>
                <li class="bg-white p-6 shadow rounded-lg flex items-center">
                    <i class="fa-solid fa-heart text-blue-500 text-2xl"></i>
                    <div class="ml-4">
                        <p>Beneficiarios</p>
                        <h3 class="text-xl font-semibold">800</h3>
                    </div>
                </li>
            </ul>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                <!-- Columna Izquierda: Gráfico de Contacto Creado -->
                <div class="bg-white p-6 rounded-lg shadow-md w-full flex flex-col items-center justify-center">
                    <h2 class="text-gray-700 text-xl font-semibold mb-4 text-center">Nuevos usuarios</h2>
                    <canvas id="grafica_nuevos_usuarios" class="w-full h-48 md:h-64 mx-auto"></canvas>
                </div>

                <!-- Columna Central: Cuadros de Métricas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Tarjeta de Contactos Nuevos -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-gray-700 text-xl font-semibold mb-4">Voluntarios</h2>
                        <p class="text-gray-700 text-3xl font-bold">444</p>
                    </div>

                    <!-- Tarjeta de Totales por Etapa de Ciclo -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-gray-700 text-xl font-semibold mb-4">Beneficiarios</h2>
                        <p class="text-gray-700 text-3xl font-bold">69</p>
                        <p class="text-green-500 text-lg">▲ 43,75%</p>
                    </div>

                    <!-- Tarjeta de Total de Visitas al Blog -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-gray-700 text-xl font-semibold mb-4">Usuarios</h2>
                        <p class="text-gray-700 text-3xl font-bold">50.812</p>
                        <p class="text-green-500 text-lg">▲ 1,17%</p>
                    </div>

                    <!-- Tarjeta de Total de Visitas a LP -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-gray-700 text-xl font-semibold mb-4">Visitantes</h2>
                        <p class="text-gray-700 text-3xl font-bold">428.376</p>
                        <p class="text-red-500 text-lg">▼ 2,78%</p>
                    </div>
                </div>

                <!-- Columna Derecha: Gráfico de Leads Calificados -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-gray-700 text-xl font-semibold mb-4">Programas</h2>
                    <canvas id="grafica_programas" class="w-full h-48 md:h-64"></canvas>
                </div>
            </div>

            <!-- Tabla de Donaciones recientes -->
            <div class="mt-8 bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-center">Donaciones recientes</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Cantidad</th>
                            <th class="p-3">Fecha de la donación</th>
                            <th class="p-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3 "><span>Derick Fernandez</span></td>
                            <td class="p-3">$200</td>
                            <td class="p-3">01-10-2024</td>
                            <td class="p-3"><span class="bg-green-300 text-green-700 py-1 px-3 rounded-full">Finalizado</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Papu Fernado Piper</span></td>
                            <td class="p-3">$2000</td>
                            <td class="p-3">10-10-2024</td>
                            <td class="p-3"><span class="bg-gray-300 text-gray-700 py-1 px-3 rounded-full">En proceso</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Papu Hector</span></td>
                            <td class="p-3">$10 bolivares</td>
                            <td class="p-3">01-10-2024</td>
                            <td class="p-3"><span class="bg-red-300 text-red-700 py-1 px-3 rounded-full">Cancelado</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 right-4 text-blue-500 text-right">
                    <a href="#">Ver todas las donaciones</a>
                </div>
            </div>

            <div class="mt-8 bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-center">Nuevos usuarios</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Rol</th>
                            <th class="p-3">Fecha de aceptado</th>
                            <th class="p-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3 "><span>Derick Fernandez</span></td>
                            <td class="p-3">Voluntario</td>
                            <td class="p-3">01-10-2024</td>
                            <td class="p-3"><span class="bg-green-300 text-green-700 py-1 px-3 rounded-full">Activo</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Papu Fer</span></td>
                            <td class="p-3">Beneficiario</td>
                            <td class="p-3">05-09-2024</td>
                            <td class="p-3"><span class="bg-red-300 text-red-700 py-1 px-3 rounded-full">Inactivo</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Papu Hector</span></td>
                            <td class="p-3">Beneficiario</td>
                            <td class="p-3">01-07-2024</td>
                            <td class="p-3"><span class="bg-gray-300 text-gray-700 py-1 px-3 rounded-full">Desactivado</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 right-4 text-blue-500 text-right">
                    <a href="{{ url('/admin/gestion_de_usuarios') }}">Ver todas los usuarios</a>
                </div>
            </div>

            <div class="mt-8 bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-center">Nuevos programas solicitado</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Nombre del programa</th>
                            <th class="p-3">Tipo de programa</th>
                            <th class="p-3">Rol del solicitado</th>
                            <th class="p-3">Fecha de solicitud</th>
                            <th class="p-3">Estado del programa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3 "><span>Unidos por la esperanza</span></td>
                            <td class="p-3">Educativo</td>
                            <td class="p-3">Beneficiario</td>
                            <td class="p-3">01-08-2025</td>
                            <td class="p-3"><span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full">En progreso</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Curso de lenguaje español</span></td>
                            <td class="p-3">Educativo</td>
                            <td class="p-3">Voluntario</td>
                            <td class="p-3">05-010-2025</td>
                            <td class="p-3"><span class="bg-green-200 text-green-600 py-1 px-3 rounded-full">Completo</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 "><span>Unidos por la esperanza</span></td>
                            <td class="p-3">Educativo</td>
                            <td class="p-3">Beneficiario</td>
                            <td class="p-3">01-08-2025</td>
                            <td class="p-3"><span class="bg-red-200 text-red-600 py-1 px-3 rounded-full">Cancelado</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 right-4 text-blue-500 text-right">
                    <a href="#">Ver todos los programas</a>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Gráfico de Contacto Creado
        let chartContact;
        const ctxContact = document.getElementById('grafica_nuevos_usuarios').getContext('2d');
        function createContactChart() {
            chartContact = new Chart(ctxContact, {
                type: 'bar',
                data: {
                    labels: ['Usuarios', 'Beneficiarios', 'Voluntarios', 'Donantes'],
                    datasets: [{
                        label: 'Contactos',
                        data: [15, 25, 10, 20],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        createContactChart();

        // Gráfico de Leads Calificados
        let chartLeads;
        const ctxLeads = document.getElementById('grafica_programas').getContext('2d');
        function createLeadsChart() {
            chartLeads = new Chart(ctxLeads, {
                type: 'pie',
                data: {
                    labels: ['Educativos', 'Culturales', 'Pobreza', 'Sociales'],
                    datasets: [{
                        label: 'Leads',
                        data: [20, 30, 25, 25],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 205, 86, 0.6)'
                        ],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        }
        createLeadsChart();
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

    // Función para redibujar las gráficas al alternar el sidebar
    function toggleSidebar() {
        // Alternar clase comprimido en el sidebar
        sidebar.classList.toggle('compressed');
        sidebar.classList.toggle('w-16');
        sidebar.classList.toggle('w-64');
        content.classList.toggle('ml-16');
        content.classList.toggle('ml-64');

        // Destruir y recrear las gráficas
        if (chartContact) chartContact.destroy();
        if (chartLeads) chartLeads.destroy();
        createContactChart();
        createLeadsChart();
    }

    menuBar.addEventListener('click', toggleSidebar);
	</script>
</body>
</html>