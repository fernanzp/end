<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-customLightGray">
    <!-- Estilos globales -->
    <style>
        @layer components {
            li a::after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 50%;
                width: 0%;
                height: 2px;
                background-color: #ECDFCC;
                transition: width 400ms cubic-bezier(0.25, 0.8, 0.25, 1), left 400ms cubic-bezier(0.25, 0.8, 0.25, 1);
            }

            li a:hover::after {
                width: 95%;
                left: 0%;
            }
        }
    </style>
    
    <div class="relative h-screen w-full">
        <!-- <img src="{{ asset('img/Fondo-index.jpg') }}" alt="Niña en pobreza" class="object-cover w-full h-full"> -->
        <video autoplay muted loop class="object-cover w-full h-full">
            <source src="{{ asset('video/video-activities.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <!-- Navbar -->
        <nav class="absolute top-0 w-full z-10">
            <ul class="flex justify-center space-x-8 p-4 bg-transparent text-customBeige">
                <li class="list-none">
                    <a href="{{ url('/') }}" class="relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                        Inicio
                    </a>
                </li>
                <li class="list-none">
                    <a href="{{ url('/activities') }}" class="relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                        Actividades
                    </a>
                </li>
                <li class="list-none">
                    <a href="{{ url('/donations') }}" class="relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                        Donaciones
                    </a>
                </li>

                <li class="list-none relative">
                    <a href="javascript:void(0);" id="perfilBtn" class="relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                        Perfil
                    </a>
                    <div id="perfilContent" class="hidden absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg transform translate-x-4">
                        <div class="p-4 bg-gray-200 text-center">
                            <!-- <div class="mb-4">
                                <img src="placeholder.jpg" alt="User Image" class="w-16 h-16 rounded-full mx-auto">
                            </div> -->
                            <p class="font-bold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="p-4 border-t text-center">
                            <a href="{{ url('/login') }}" class="block text-black hover:none">Iniciar sesión</a>
                            <a href="{{ url('/register') }}" class="block mt-2 text-black hover:none">Registrarse</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Texto Principal -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-0">
            <h1 class="text-customBeige text-7xl font-bold">Transformemos vidas juntos</h1>
            <p class="text-customBeige text-2xl mt-4">Tu ayuda puede llevar esperanza y oportunidades a miles de niños y familias.</p>
        </div>
    </div>

    <div class="container bg-customLightGray mx-auto p-4">
        <!-- Grid for cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-9">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Unidos por la esperanza</h3>
                    <p class="text-sm text-gray-600 mb-4">85% Participants: 1,500 - Donated Money: 14,000$</p>
                    <p class="text-gray-700">Ayudando a romper el ciclo de la desigualdad. Tu apoyo puede hacer una diferencia significativa en las vidas de los niños más vulnerables.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Educación para el futuro</h3>
                    <p class="text-sm text-gray-600 mb-4">80% Participants: 3,200 - Donated Money: 17,000$</p>
                    <p class="text-gray-700">Juntos por un cambio. Ayudemos a los niños y niñas en situación de riesgo para brindarles mejores oportunidades educativas.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>
            
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Project Image">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">Construyendo comunidades</h3>
                    <p class="text-sm text-gray-600 mb-4">90% Participants: 1,300 - Donated Money: 10,000$</p>
                    <p class="text-gray-700">Empoderando a nuestras vidas. Sigue el camino para generar un cambio profundo en la estructura comunitaria y mejorar la calidad de vida.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <nav class="inline-flex space-x-1">
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-100">1</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-100">2</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-100">3</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-100">4</a>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-100">5</a>
                <span class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-500">...</span>
                <a href="#" class="bg-white border border-gray-300 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-100">10</a>
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

    <script>
        var perfilBtn = document.getElementById('perfilBtn');
        var perfilContent = document.getElementById('perfilContent');

        // Toggle para mostrar/ocultar el contenido de perfil
        perfilBtn.addEventListener('click', function () {
            perfilContent.classList.toggle('hidden');
        });

        // Ocultar el contenido de perfil si se hace clic fuera del área
        window.addEventListener('click', function (e) {
            if (!perfilBtn.contains(e.target) && !perfilContent.contains(e.target)) {
                perfilContent.classList.add('hidden');
            }
        });
    </script>
</body>
</html>