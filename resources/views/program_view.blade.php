<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>END</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="relative h-screen w-full">

    <style>
        @layer components {
            a::after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 50%;
                width: 0%;
                height: 2px;
                background-color: #ECDFCC;
                transition: width 400ms cubic-bezier(0.25, 0.8, 0.25, 1), left 400ms cubic-bezier(0.25, 0.8, 0.25, 1);
            }

            a:hover::after {
                width: 95%;
                left: 0%;
            }
        }
    </style>

    <img src="{{ asset('img/actividad1-activities.jpg') }}" alt="Niña en pobreza" class="object-cover w-full h-full">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <div class="absolute top-8 left-8 flex items-center text-white text-xl z-20">
        <a href="{{ url('/activities') }}" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Regresar
        </a>
    </div>

    <div class="absolute inset-0 flex items-center justify-center z-10 px-4">
        <div class="text-center mr-16">
            <h1 class="text-white text-7xl font-bold leading-tight">Unidos por la esperanza:</h1>
            <p class="text-white text-4xl mt-8">Ayudando a romper el ciclo de la desigualdad</p>
        </div>

        <div class="w-[28rem] p-8 bg-white bg-opacity-90 rounded-xl shadow-lg">
            <p class="text-3xl font-bold mb-6">Fecha & hora:</p>
            <p class="text-gray-600 text-2xl mb-8">Miércoles 14 Sept, 2024 - 08:00PM</p>

            <div class="flex items-center mb-8 text-purple-600 hover:text-purple-800 cursor-pointer text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10 mr-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12A9 9 0 1112 3a9 9 0 019 9z" />
                </svg>
                <a href="#" class="text-xl">Añadir calendario</a>
            </div>

            <button class="w-full bg-purple-600 text-white text-xl py-5 px-6 rounded-lg mb-6 hover:bg-purple-800 transition">Inscríbete ahora</button>
            <button class="w-full bg-gray-200 text-gray-800 text-xl py-5 px-6 rounded-lg mb-6 hover:bg-gray-300 transition">Inscríbete en la fecha programada</button>

            <div class="flex items-center text-black hover:text-gray-800 cursor-pointer text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10 mr-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V8l7 4.5L9 17z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21.5a9.5 9.5 0 100-19 9.5 9.5 0 000 19z" />
                </svg>
                <!-- <a href="#" class="text-xl">Mirar en el mapa</a> -->
                <button class="text-xl">Mirar en el mapa</button>
            </div>
        </div>
    </div>

    <!-- Contenedor principal con dos columnas -->
    <div class="bg-customLightGray grid grid-cols-2 gap-8 h-full">
        <!-- Columna izquierda -->
        <div class="bg-customLighterGray p-6 flex flex-col justify-center m-4 rounded-lg">
            <h2 class="text-customGreen text-4xl font-bold mb-4">Descripción de la actividad</h2>
            <p class="text-customBeige text-xl mb-6 text-justify">
                Esta actividad tiene como objetivo abordar directamente la desigualdad educativa en comunidades desfavorecidas.
                A través de jornadas de educación, sensibilización y apoyo comunitario, buscamos ofrecer a niños y familias vulnerables
                las herramientas necesarias para superar las barreras sociales y económicas que los mantienen en situaciones de desventaja.
            </p>
            <p class="text-customBeige text-xl mb-6">
                La actividad incluye talleres interactivos y sesiones de aprendizaje enfocadas en desarrollar habilidades académicas
                y emocionales en los más jóvenes.
            </p>

            <h3 class="text-customGreen text-3xl font-bold mb-4">Fechas y horas</h3>
            <p class="text-customBeige text-xl mb-2">Horario del sábado: 7PM - 10PM</p>
            <p class="text-customBeige text-xl mb-6">Horario del domingo: 10AM - 3PM</p>
        </div>

        <!-- Columna derecha -->
        <div class="bg-customLighterGray p-6 m-4 rounded-lg">
            <h3 class="text-customGreen text-4xl font-bold mb-4 text-center">Ubicación de la actividad</h3>
            <div class="w-full h-65 bg-gray-200 rounded-lg mb-4">
                <img src="{{ asset('img/actividad1-activities.jpg') }}" alt="Mapa" class="w-full h-[70%] object-cover rounded-lg">
            </div>

            <div class="mt-4">
                <h3 class="text-customGreen text-4xl font-bold">Unidos por la esperanza:</h3>
                <br>
                <p class="text-customBeige text-xl mb-4">Ayudando a romper el ciclo de la desigualdad.</p>
                <p class="text-customBeige text-xl">4728 Poplar Crescent, Residencial Sunset, Apt. 468, junto a la estación del tren, Greenville, Michigan, 46001, México</p>
            </div>
        </div>
    </div>

    <div class="bg-customLightGray w-screen h-screen py-12">
        <div class="container mx-auto relative h-full">

            <!-- Contenedor del contenido dinámico -->
            <div class="flex flex-row items-center justify-between space-x-8 px-4 h-full">

                <!-- Contenido 2 -->
                <div class="w-1/2 content-slide h-full flex flex-col justify-center">
                    <h1 class="text-4xl font-bold text-customGreen leading-tight mb-4">
                        Estás a un paso de apoyar a mejorar la educación de miles de estudiantes
                    </h1>
                    <h2 class="text-2xl font-semibold text-customBeige mb-6">
                        Ingresa el monto a donar deseado:
                    </h2>

                    <!-- Botones de donación -->
                    <div class="grid grid-cols-3 gap-4">
                        <button class="px-6 py-4 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            100$
                        </button>
                        <button class="px-6 py-4 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            200$
                        </button>
                        <button class="px-6 py-4 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            300$
                        </button>
                        <button class="px-6 py-4 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            500$
                        </button>
                        <button class="px-6 py-4 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            800$
                        </button>
                        <button class="px-6 py-4 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            1000$
                        </button>
                    </div>

                    <button class="mt-6 w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-lg border border-white text-1xl">
                        Continuar
                    </button>
                </div>

                <!-- Imagen 2 -->
                <div class="w-1/2 content-slide h-full">
                    <img src="{{ asset('img/seccion2-index.jpeg') }}" alt="Niños en situación de pobreza" class="object-cover rounded-lg shadow-lg w-full h-full">
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-customLightGray mx-auto p-16">
        <h2 class="text-4xl font-bold text-center text-customGreen mb-8">Actividades</h2>
        <!-- Grid for cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 ">
            <!-- Card 1 -->
            <div class=" shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad1-activities.jpg') }}" alt="Imagen">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2 text-customGreen">Unidos por la esperanza</h3>
                    <p class="text-sm text-gray-400 mb-2">85% Participants: 1,500 - Donated Money: 14,000$</p>
                    <p class="text-sm text-gray-400 mb-4">Fecha: Martes 25 de Febrero del 2025</p>
                    <p class="text-customBeige">Ayudando a romper el ciclo de la desigualdad. Tu apoyo puede hacer una diferencia significativa en las vidas de los niños más vulnerables.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="window.location.href='{{ url('/activities_description') }}';">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad2-activities.jpg') }}" alt="Imagen">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2 text-customGreen">Educación para el futuro</h3>
                    <p class="text-sm text-gray-400 mb-2">80% Participants: 3,200 - Donated Money: 17,000$</p>
                    <p class="text-sm text-gray-400 mb-4">Fecha: Martes 25 de Febrero del 2025</p>
                    <p class="text-customBeige">Juntos por un cambio. Ayudemos a los niños y niñas en situación de riesgo para brindarles mejores oportunidades educativas.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad3-activities.jpg') }}" alt="Imagen">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2 text-customGreen">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-400 mb-2">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-sm text-gray-400 mb-4">Fecha: Martes 25 de Febrero del 2025</p>
                    <p class="text-customBeige">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <nav class="inline-flex space-x-1">
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-300">1</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-300">2</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-300">3</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-300">4</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-300">5</a>
                <span class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-500">...</span>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-300">10</a>
            </nav>
        </div>
    </div>

        <!-- Sección footer -->
        <footer class="bg-customDarkGray text-gray-400 py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4 text-center">
            
            <!-- ¿Quiénes somos? -->
            <div>
                <h3 class="text-customGreen font-semibold mb-4">¿Quiénes somos?</h3>
                <ul class="space-y-2">
                    <p>Education Non-Disparity</p>
                    <!-- <li><a href="#" class="hover:underline">Conviértete en beneficiario</a></li>
                    <li><a href="#" class="hover:underline">Conviértete en donante</a></li>
                    <li><a href="#" class="hover:underline">Conviértete en voluntario</a></li> -->
                </ul>
            </div>
            
            <!-- Únete a nuestra ONG -->
            <div>
                <h3 class="text-customGreen font-semibold mb-4">Únete a nuestra ONG</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="relative transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">Conviértete en beneficiario</a></li>
                    <li><a href="#" class="relative transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">Conviértete en donante</a></li>
                    <li><a href="#" class="relative transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">Conviértete en voluntario</a></li>
                </ul>
            </div>
            
            <!-- Información de contacto -->
            <div>
                <h3 class="text-customGreen font-semibold mb-4">Información de contacto</h3>
                <p>Education Non-Disparity</p>
                <p>Correo: info@EducationNon-Disparity.org</p>
                <p>Tel: +54 91 123 4567</p>
                <p>Horario: Lunes a Viernes, 9:00A.M - 18:00P.M</p>
            </div>
            
        </div>
    </footer>
</body>

</html>