<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>END</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Estilos globales -->
    <style>
        <x-ahoverstyles />
    </style>

    <div class="relative h-screen w-full">
        <!-- <img src="{{ asset('img/Fondo-index.jpg') }}" alt="Niña en pobreza" class="object-cover w-full h-full"> -->
        <video autoplay muted loop class="object-cover w-full h-full">
            <source src="{{ asset('video/video-index.mp4') }}" type="video/mp4">
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
    
    <!-- Sección 2 -->
    <!-- bg-customLightGray -->
    <div class="bg-customLightGray w-screen h-screen py-12">
        <div class="container mx-auto relative h-full">

            <!-- Contenedor del contenido dinámico -->
            <div class="flex flex-row items-center justify-between space-x-8 px-4 h-full" id="carousel-content">

                <!-- Contenido 1 -->
                <div class="w-1/2 content-slide h-full flex flex-col justify-center">
                    <h1 class="text-4xl font-bold text-customGreen leading-tight mb-4">
                        Únete a la Lucha contra la Pobreza y la Desigualdad
                    </h1>
                    <h2 class="text-2xl font-semibold text-customBeige mb-6">
                        Tu apoyo puede marcar la diferencia
                    </h2>
                    <p class="text-1xl text-customBeige text-base text-justify leading-relaxed">
                        En nuestra ONG, trabajamos incansablemente para reducir la pobreza y la desigualdad promoviendo educación de calidad y creando oportunidades para quienes más lo necesitan. Sin embargo, no podemos hacerlo solos. Necesitamos tu ayuda.
                    </p>
                </div>

                <!-- Imagen 1 -->
                <div class="w-1/2 content-slide h-full">
                    <img src="{{ asset('img/Fondo2-index.png') }}" alt="Niño en situación de pobreza" class="object-cover rounded-lg shadow-lg w-full h-full">
                </div>

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
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            100$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            200$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            300$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            500$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            800$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600 text-1xl">
                            1000$
                        </button>
                    </div>
                    <button class="mt-6 w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg border border-white">
                        Continuar
                    </button>
                </div>

                <!-- Imagen 2 -->
                <div class="w-1/2 content-slide hidden h-full">
                    <img src="{{ asset('img/seccion2-index.jpeg') }}" alt="Niños en situación de pobreza" class="object-cover rounded-lg shadow-lg w-full h-full">
                </div>
            </div>

            <!-- Botones de navegación -->
            <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-full">
                &#10094;
            </button>
            <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-full">
                &#10095;
            </button>
        </div>
    </div>

    <!-- Sección cómo puedes apoyar -->
    <div class="bg-customLightGray py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-customGreen mb-8">¿Cómo puedes apoyar?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Tarjeta 1: Comparte nuestra misión -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen1-index.png') }}" alt="Comparte nuestra misión" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Comparte nuestra misión</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Difunde nuestra causa entre tu red de contactos y en redes sociales. Cuantas más personas conozcan nuestro trabajo, más impacto podemos tener.
                    </p>
                </div>

                <!-- Tarjeta 2: Donación general -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen2-index.png') }}" alt="Donación general" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Donación general</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Cada contribución cuenta. Con tu aporte, podemos continuar nuestros proyectos de educación, desarrollo y asistencia a comunidades vulnerables.
                    </p>
                </div>

                <!-- Tarjeta 3: Vuélvete un voluntario -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen3-index.png') }}" alt="Vuélvete un voluntario" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Vuélvete un voluntario</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Únete a nuestros esfuerzos como voluntario y ayuda directamente en nuestras iniciativas.
                    </p>
                </div>

                <!-- Tarjeta 4: Forma parte de las actividades -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen4-index.png') }}" alt="Forma parte de las actividades" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Forma parte de las actividades</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Asiste a eventos, talleres y campañas que organizamos para concienciar sobre la pobreza y la desigualdad. Tu participación activa puede inspirar a otros y contribuir al cambio.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <x-footer />
    
    <script>
        const slides = document.querySelectorAll('.content-slide');
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index * 2 || i === index * 2 + 1) {
                    slide.classList.remove('hidden');
                } else {
                    slide.classList.add('hidden');
                }
            });
        }

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % (slides.length / 2);
            showSlide(currentIndex);
        });

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slides.length / 2) % (slides.length / 2);
            showSlide(currentIndex);
        });

        // Mostrar el primer slide inicialmente
        showSlide(0);

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