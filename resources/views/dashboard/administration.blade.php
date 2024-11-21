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

        <!-- NAVBAR -->
        <nav class="flex items-center justify-between rounded-lg bg-customLighterGray shadow px-6 py-4 relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="menuBar" class="w-8 h-8 cursor-pointer" fill="#1ab76a"><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
            <div class="flex items-center relative">
                <a href="#" class="notification relative mr-6" id="notificationBell">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-8 h-8 cursor-pointer" fill="#1ab76a"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                    <span class="num bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center absolute -top-1 -right-1">8</span>
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
                    <img src="{{ asset(Auth::user()->profile_img) }}" alt="User Image" class="w-12 h-12 rounded-full mx-auto">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main class="mt-8">
            <div class="head-title flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <h1 class="text-xl text-customGreen">Análisis</h1>
                    <span class="mx-2 mt-1 text-gray-500"> &gt; </span>
                    <p class="text-gray-500 mt-1 cursor-pointer hover:text-gray-400 duration-300 ease-in-out">Donaciones recientes</p>
                    <span class="mx-2 mt-1 text-gray-500"> &gt; </span>
                    <p class="text-gray-500 mt-1 cursor-pointer hover:text-gray-400 duration-300 ease-in-out">Nuevos usuarios</p>
                    <span class="mx-2 mt-1 text-gray-500"> &gt; </span>
                    <p class="text-gray-500 mt-1 cursor-pointer hover:text-gray-400 duration-300 ease-in-out">Nuevos programas solicitados</p>
                </div>
            </div>

            <!-- Caja de Informacion -->
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#1ab76a" class="w-8 h-8 mr-4">
                    <path d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z"/>
                </svg>
                <h2 class="merriweather-bold text-customGreen text-4xl font-bold mb-4">Cifras totales</h2>
            </div>
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                <li class="bg-customLighterGray p-6 shadow rounded-lg flex items-center text-customBeige">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-8 h-8" fill="#1ab76a"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                    <div class="ml-4">
                        <p class="font-bold text-xl">Usuarios registrados</p>
                        <h3 class="text-xl">{{ $totalUsers }}</h3>
                    </div>
                </li>
                <li class="bg-customLighterGray p-6 shadow rounded-lg flex items-center text-customBeige">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-8 h-8" fill="#1ab76a"><path d="M544 248l0 3.3 69.7-69.7c21.9-21.9 21.9-57.3 0-79.2L535.6 24.4c-21.9-21.9-57.3-21.9-79.2 0L416.3 64.5c-2.7-.3-5.5-.5-8.3-.5L296 64c-37.1 0-67.6 28-71.6 64l-.4 0 0 120c0 22.1 17.9 40 40 40s40-17.9 40-40l0-72c0 0 0-.1 0-.1l0-15.9 16 0 136 0c0 0 0 0 .1 0l7.9 0c44.2 0 80 35.8 80 80l0 8zM336 192l0 56c0 39.8-32.2 72-72 72s-72-32.2-72-72l0-118.6c-35.9 6.2-65.8 32.3-76 68.2L99.5 255.2 26.3 328.4c-21.9 21.9-21.9 57.3 0 79.2l78.1 78.1c21.9 21.9 57.3 21.9 79.2 0l37.7-37.7c.9 0 1.8 .1 2.7 .1l160 0c26.5 0 48-21.5 48-48c0-5.6-1-11-2.7-16l2.7 0c26.5 0 48-21.5 48-48c0-12.8-5-24.4-13.2-33c25.7-5 45.1-27.6 45.2-54.8l0-.4c-.1-30.8-25.1-55.8-56-55.8c0 0 0 0 0 0l-120 0z"/></svg>
                    <div class="ml-4">
                        <p class="font-bold text-xl">Voluntarios totales</p>
                        <h3 class="text-xl">{{ $totalVolunteers }}</h3>
                    </div>
                </li>
                <li class="bg-customLighterGray p-6 shadow rounded-lg flex items-center text-customBeige">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-8 h-8" fill="#1ab76a"><path d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z"/></svg>
                    <div class="ml-4">
                        <p class="font-bold text-xl">Monto total recaudado</p>
                        <h3 class="text-xl">${{ number_format($totalAmountRaised, 2) }}</h3>
                    </div>
                </li>
                <li class="bg-customLighterGray p-6 shadow rounded-lg flex items-center text-customBeige">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7" fill="#1ab76a"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                    <div class="ml-4">
                        <p class="font-bold text-xl">Beneficiarios totales</p>
                        <h3 class="text-xl">{{ $totalBeneficiaries }}</h3>
                    </div>
                </li>
            </ul>

            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#1ab76a" class="w-8 h-8 mr-4">
                    <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                </svg>
                <h2 class="merriweather-bold text-customGreen text-4xl font-bold mb-4">Estadísticas recientes</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Tarjeta de Contactos Nuevos -->
                <div class="bg-customLighterGray p-6 rounded-lg shadow-md flex-col">
                    <h2 class="text-customBeige text-xl font-semibold mb-2">Voluntarios</h2>
                    <div class="flex">
                        <p class="text-customBeige text-xl mr-3">444</p>
                        <p class="text-green-500 text-sm">▲ 43.75%</p>
                    </div>
                </div>

                <!-- Tarjeta de Totales por Etapa de Ciclo -->
                <div class="bg-customLighterGray p-6 rounded-lg shadow-md">
                    <h2 class="text-customBeige text-xl font-semibold mb-2">Beneficiarios</h2>
                    <div class="flex">
                        <p class="text-customBeige text-xl mr-3">69</p>
                        <p class="text-green-500 text-sm">▲ 43.75%</p>
                    </div>
                </div>

                <!-- Tarjeta de Total de Visitas al Blog -->
                <div class="bg-customLighterGray p-6 rounded-lg shadow-md">
                    <h2 class="text-customBeige text-xl font-semibold mb-2">Usuarios</h2>
                    <div class="flex">
                        <p class="text-customBeige text-xl mr-3">50</p>
                        <p class="text-green-500 text-sm">▲ 1.17%</p>
                    </div>
                </div>

                <!-- Tarjeta de Total de Visitas a LP -->
                <div class="bg-customLighterGray p-6 rounded-lg shadow-md">
                    <h2 class="text-customBeige text-xl font-semibold mb-2">Visitantes</h2>
                    <div class="flex">
                        <p class="text-customBeige text-xl mr-3">428</p>
                        <p class="text-red-500 text-sm">▼ 2.78%</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Columna Izquierda: Gráfico de Contacto Creado -->
                <div class="bg-customLighterGray p-6 rounded-lg w-full flex flex-col items-center justify-center lg:col-span-2">
                    <div class="relative w-full max-w-4xl bg-customLighterGray rounded-lg pt-12">
                        <canvas id="lineChart"></canvas>
                        <div class="absolute top-4 right-4 flex space-x-2 mb-4">
                            <button onclick="updateChart('1W')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1W</button>
                            <button onclick="updateChart('1M')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1M</button>
                            <button onclick="updateChart('1Y')" class="interval-btn bg-transparent text-customGreen border-2 border-customGreen px-3 py-1 text-sm rounded-md">1Y</button>
                        </div>
                    </div>
                </div>
            
                <!-- Columna Derecha: Gráfico de Leads Calificados -->
                <div class="bg-customLighterGray p-6 rounded-lg shadow-md lg:col-span-1">
                    <h2 class="text-customBeige text-center text-xl font-semibold mb-4">Programas</h2>
                    <canvas id="grafica_programas" class="w-full h-48 md:h-64"></canvas>
                </div>
            </div>
<!-- 
            <section class="bg-gray-100 flex items-center justify-center mt-8">
                <div class="relative w-full max-w-4xl bg-white shadow-md rounded-lg p-6">
                    <canvas id="lineChart"></canvas>
                    <div class="absolute top-4 right-4 flex space-x-2">
                        <button onclick="updateChart('1W')" class="interval-btn bg-gray-200 text-gray-700 px-3 py-1 text-sm rounded-md">1W</button>
                        <button onclick="updateChart('1M')" class="interval-btn bg-gray-200 text-gray-700 px-3 py-1 text-sm rounded-md">1M</button>
                        <button onclick="updateChart('1Y')" class="interval-btn bg-gray-200 text-gray-700 px-3 py-1 text-sm rounded-md">1Y</button>
                    </div>
                </div>
            </section> -->

            <!-- Tabla de Donaciones recientes -->
            <div class="mt-8 bg-customLighterGray p-6 shadow rounded-lg">
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
                            <td class="p-3 text-customBeige"><span class="bg-green-300 text-green-700 w-28 py-1 px-3 rounded-full inline-block">Finalizado</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Fernado Piper</span></td>
                            <td class="p-3 text-customBeige">$2000</td>
                            <td class="p-3 text-customBeige">10-10-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-gray-300 text-gray-700 w-28 py-1 px-3 rounded-full inline-block">En proceso</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Hector</span></td>
                            <td class="p-3 text-customBeige">$10 bolivares</td>
                            <td class="p-3 text-customBeige">01-10-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-red-300 text-red-700 w-28 py-1 px-3 rounded-full inline-block">Cancelado</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 right-4 text-customBeige hover:text-customDarkBeige text-right">
                    <a href="#">Ver todas las donaciones</a>
                </div>
            </div>

            <div class="mt-8 bg-customLighterGray p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold text-customGreen mb-4 text-center">Nuevos usuarios</h3>
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-customDarkGray">
                            <th class="p-3 text-customBeige">Nombre</th>
                            <th class="p-3 text-customBeige">Correo</th>
                            <th class="p-3 text-customBeige">Rol</th>
                            <th class="p-3 text-customBeige">Fecha de aceptado</th>
                            <th class="p-3 text-customBeige">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Derick Fernandez</span></td>
                            <td class="p-3 text-customBeige">fff@gmail.com</td>
                            <td class="p-3 text-customBeige">Voluntario</td>
                            <td class="p-3 text-customBeige">01-10-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-green-300 text-green-700 w-28 py-1 px-3 rounded-full inline-block">Activo</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Fer</span></td>
                            <td class="p-3 text-customBeige">fff@gmail.com</td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">05-09-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-red-300 text-red-700 w-28 py-1 px-3 rounded-full inline-block">Inactivo</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Papu Hector</span></td>
                            <td class="p-3 text-customBeige">fff@gmail.com</td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">01-07-2024</td>
                            <td class="p-3 text-customBeige"><span class="bg-gray-300 text-gray-700 w-28 py-1 px-3 rounded-full inline-block">Desactivado</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 right-4 text-customBeige hover:text-customDarkBeige text-right">
                    <a href="{{ url('/admin/gestion_de_usuarios') }}">Ver todos los usuarios</a>
                </div>
            </div>

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
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Unidos por la esperanza</span></td>
                            <td class="p-3 text-customBeige">Educativo</td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">01-08-2025</td>
                            <td class="p-3"><span class="bg-gray-200 text-gray-600 w-28 py-1 px-3 rounded-full inline-block">En progreso</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Curso de lenguaje español</span></td>
                            <td class="p-3 text-customBeige">Educativo</td>
                            <td class="p-3 text-customBeige">Voluntario</td>
                            <td class="p-3 text-customBeige">05-010-2025</td>
                            <td class="p-3 "><span class="bg-green-200 text-green-600 w-28 py-1 px-3 rounded-full inline-block">Completo</span></td>
                        </tr>
                        <tr class="border-b border-black bg-customLightGray">
                            <td class="p-3 text-customBeige"><span>Unidos por la esperanza</span></td>
                            <td class="p-3 text-customBeige">Educativo</td>
                            <td class="p-3 text-customBeige">Beneficiario</td>
                            <td class="p-3 text-customBeige">01-08-2025</td>
                            <td class="p-3"><span class="bg-red-200 text-red-600 w-28 py-1 px-3 rounded-full inline-block">Cancelado</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 right-4 text-customBeige hover:text-customDarkBeige text-right">
                    <a href="#">Ver todos los programas</a>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Gráfico de rectángulos
        // let chartContact;
        // const ctxContact = document.getElementById('grafica_nuevos_usuarios').getContext('2d');

        // function createContactChart() {
        //     chartContact = new Chart(ctxContact, {
        //         type: 'bar',
        //         data: {
        //             labels: ['Usuarios', 'Beneficiarios', 'Voluntarios', 'Donantes'],
        //             datasets: [{
        //                 label: 'Contactos',
        //                 data: [15, 25, 10, 20],
        //                 backgroundColor: 'rgba(80, 200, 250, 1)'
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 legend: {
        //                     labels: {
        //                         color: '#ECDFCC'
        //                     }
        //                 },
        //             },
        //             scales: {
        //                 x: {
        //                     ticks: {
        //                         color: '#ECDFCC'
        //                     },
        //                     grid: {
        //                         color: '#1E201E',
        //                         drawBorder: true
        //                     }
        //                 },
        //                 y: {
        //                     ticks: {
        //                         color: '#ECDFCC'
        //                     },
        //                     grid: {
        //                         color: '#1E201E',
        //                         drawBorder: true
        //                     },
        //                     beginAtZero: true
        //                 }
        //             }
        //         }
        //     });
        // }
        // createContactChart();

        // Gráfico circular
        let chartLeads;
        const ctxLeads = document.getElementById('grafica_programas').getContext('2d');
        function createLeadsChart() {
            chartLeads = new Chart(ctxLeads, {
                type: 'pie',
                data: {
                    labels: ['Educativos', 'Económicos', 'Caritativos', 'Inclusivos', 'Capasitativos', 'Otros'],
                    datasets: [{
                        label: 'Leads',
                        data: [44, 21, 16, 8, 7, 4],
                        backgroundColor: [
                            'rgba(249, 115, 22, 1)',
                            'rgba(26, 183, 106, 1)',
                            'rgba(211, 197, 180, 1)',
                            'rgba(46, 139, 207, 1)',
                            'rgba(234, 172, 68, 1)',
                            'rgba(238, 77, 77, 1)'
                        ],
                        borderColor: 'rgba(255, 255, 255, 255)',
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: '#ECDFCC', // Cambia el color del texto de las leyendas
                                font: {
                                    size: 12, // Ajusta el tamaño de la fuente
                                    // family: 'Sans' // Cambia la familia de la fuente
                                }
                            }
                        },
                        tooltip: {
                            bodyColor: '#ECDFCC', // Cambia el color del texto en las tooltips
                            titleColor: '#ECDFCC', // Cambia el color del título en las tooltips
                            footerColor: '#ECDFCC' // Cambia el color del pie en las tooltips
                        }
                    }
                }
            });
        }
        createLeadsChart();

        //Grafica de usuarios
        const ctx = document.getElementById('lineChart').getContext('2d');

        const dataFromController = @json($data);

        // Etiquetas para los días de la semana y meses del año
        const daysOfWeek = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
        const monthsOfYear = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        // Configuración de la gráfica semanal (1W)
        const today = new Date().getDay();
        const orderedDays = [...daysOfWeek.slice(today), ...daysOfWeek.slice(0, today)];

        // Configuración de la gráfica anual (1Y)
        const currentMonth = new Date().getMonth();
        const orderedMonths = [...monthsOfYear.slice(currentMonth + 1), ...monthsOfYear.slice(0, currentMonth + 1)];

        const dataSets = {
            '1W': { 
                labels: orderedDays,
                datasets: [
                    { 
                        label: 'Usuario', 
                        data: dataFromController.weekly.user,
                        borderColor: 'rgba(211, 197, 180, 1)', 
                        backgroundColor: 'rgba(211, 197, 180, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(211, 197, 180, 1)' 
                    },
                    { 
                        label: 'Voluntario', 
                        data: dataFromController.weekly.volunteer,
                        borderColor: 'rgba(26, 183, 106, 1)', 
                        backgroundColor: 'rgba(26, 183, 106, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(26, 183, 106, 1)' 
                    },
                    { 
                        label: 'Beneficiario', 
                        data: dataFromController.weekly.beneficiary, 
                        borderColor: 'rgba(249, 115, 22, 1)', 
                        backgroundColor: 'rgba(249, 115, 22, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(249, 115, 22, 1)' 
                    },
                ] 
            },
            '1M': { 
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'], 
                datasets: [
                    { 
                        label: 'Usuario', 
                        data: [1300, 1210, 540, 1330], 
                        borderColor: 'rgba(211, 197, 180, 1)', 
                        backgroundColor: 'rgba(211, 197, 180, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(211, 197, 180, 1)' 
                    },
                    { 
                        label: 'Voluntario', 
                        data: [1250, 800, 600, 900], 
                        borderColor: 'rgba(26, 183, 106, 1)', 
                        backgroundColor: 'rgba(26, 183, 106, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(26, 183, 106, 1)' 
                    },
                    { 
                        label: 'Beneficiario', 
                        data: [1200, 1050, 500, 1100], 
                        borderColor: 'rgba(249, 115, 22, 1)', 
                        backgroundColor: 'rgba(249, 115, 22, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(249, 115, 22, 1)' 
                    },
                ]
            },
            '1Y': { 
                labels: orderedMonths,
                datasets: [
                    { 
                        label: 'Usuario', 
                        data: dataFromController.yearly.user,
                        borderColor: 'rgba(211, 197, 180, 1)', 
                        backgroundColor: 'rgba(211, 197, 180, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(211, 197, 180, 1)' 
                    },
                    { 
                        label: 'Voluntario', 
                        data: dataFromController.yearly.volunteer, 
                        borderColor: 'rgba(26, 183, 106, 1)', 
                        backgroundColor: 'rgba(26, 183, 106, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(26, 183, 106, 1)' 
                    },
                    { 
                        label: 'Beneficiario', 
                        data: dataFromController.yearly.beneficiary,
                        borderColor: 'rgba(249, 115, 22, 1)', 
                        backgroundColor: 'rgba(249, 115, 22, 1)', 
                        borderWidth: 2, 
                        tension: 0.4, 
                        pointRadius: 4, 
                        pointBackgroundColor: 'rgba(249, 115, 22, 1)' 
                    },
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
                                return `${context.raw}`;
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
                            text: 'Usuarios'
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