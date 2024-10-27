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
        <x-ahoverstyles />
    </style>
    
    <div class="relative h-screen w-full">
        <!-- <img src="{{ asset('img/Fondo-index.jpg') }}" alt="Niña en pobreza" class="object-cover w-full h-full"> -->
        <video autoplay muted loop class="object-cover w-full h-full">
            <source src="{{ asset('video/video-activities.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <!-- Navbar -->
        <x-navbar />

        <!-- Texto Principal -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-0">
            <h1 class="text-customBeige text-7xl font-bold">Transformemos vidas juntos</h1>
            <p class="text-customBeige text-2xl mt-4">Tu ayuda puede llevar esperanza y oportunidades a miles de niños y familias.</p>
        </div>
    </div>

    <div class="container bg-customLightGray mx-auto p-4 m-8">
        <h2 class="text-4xl font-bold text-center text-customGreen mb-8">Actividades</h2>
        <!-- Grid for cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad1-activities.jpg') }}" alt="Imagen">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2 text-customGreen">Unidos por la esperanza</h3>
                    <p class="text-sm text-gray-400 mb-2">85% Participants: 1,500 - Donated Money: 14,000$</p>
                    <p class="text-sm text-gray-400 mb-4">Fecha: Martes 25 de Febrero del 2025</p>
                    <p class="text-customBeige">Ayudando a romper el ciclo de la desigualdad. Tu apoyo puede hacer una diferencia significativa en las vidas de los niños más vulnerables.</p>
                    <div class="flex justify-end">
                        <button class="mt-4 bg-customGreen text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
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
                        <button class="mt-4 bg-customBtnGreen text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
                    </div>
                </div>
            </div>

            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad4-activities.jpg') }}" alt="Imagen">
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

            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad5-activities.jpg') }}" alt="Imagen">
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

            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad6-activities.jpg') }}" alt="Imagen">
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
            
            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad7-activities.jpg') }}" alt="Imagen">
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

            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad8-activities.jpg') }}" alt="Imagen">
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

            <div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('img/actividad9-activities.jpg') }}" alt="Imagen">
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

    <!-- Footer -->
    <x-footer />

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