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
        <source src="{{ asset('video/video-index.mp4') }}" type="video/mp4">
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
                            @auth
                                <!-- <div class="mb-4">
                                    <img src="placeholder.jpg" alt="User Image" class="w-16 h-16 rounded-full mx-auto">
                                </div> -->
                                <p class="font-bold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-gray-500">{{ Auth::user()->email }}</p>
                            @else
                                <p class="font-bold text-gray-800"></p>
                            @endauth
                        </div>
                        <div class="p-4 border-t text-center">
                            @auth
                                <a href="{{ url('/logout') }}" class="block text-black hover:none">Cerrar sesión</a>
                            @else
                                <a href="{{ url('/login') }}" class="block text-black hover:none">Iniciar sesión</a>
                                <a href="{{ url('/register') }}" class="block mt-2 text-black hover:none">Registrarse</a>
                            @endauth
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
    
    <!-- Sección 2 -->
    <!-- bg-customLightGray -->
    <div class="bg-customLightGray py-12">
        <div class="container mx-auto relative">

            <!-- Contenedor del contenido dinámico -->
            <div class="flex flex-row items-center justify-between space-x-8 px-4" id="carousel-content">

                <!-- Contenido 1 -->
                <div class="w-1/2 content-slide">
                    <h1 class="text-4xl font-bold text-customGreen leading-tight mb-4">
                        Únete a la Lucha contra la Pobreza y la Desigualdad
                    </h1>
                    <h2 class="text-lg font-semibold text-customBeige mb-6">
                        Tu apoyo puede marcar la diferencia
                    </h2>
                    <p class="text-customBeige text-base text-justify leading-relaxed">
                        En nuestra ONG, trabajamos incansablemente para reducir la pobreza y la desigualdad promoviendo educación de calidad y creando oportunidades para quienes más lo necesitan. Sin embargo, no podemos hacerlo solos. Necesitamos tu ayuda.
                    </p>
                </div>

                <!-- Imagen 1 -->
                <div class="w-1/2 content-slide">
                    <img src="{{ asset('img/Fondo2-index.png') }}" alt="Niño en situación de pobreza" class="object-cover rounded-lg shadow-lg w-full h-full max-h-96">
                </div>

                <!-- Contenido 2 -->
                <div class="w-1/2 content-slide hidden">
                    <h1 class="text-2xl font-bold text-customGreen leading-tight mb-4">
                        Estás a un paso de apoyar a mejorar la educación de miles de estudiantes
                    </h1>
                    <h2 class="text-lg font-semibold text-customBeige mb-6">
                        Ingresa el monto a donar deseado:
                    </h2>

                    <!-- Botones de donación -->
                    <div class="grid grid-cols-3 gap-4">
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600">
                            100$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600">
                            200$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600">
                            300$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600">
                            500$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600">
                            800$
                        </button>
                        <button class="px-4 py-2 bg-transparent text-white font-bold rounded border border-white hover:bg-orange-600 hover:border-orange-600">
                            1000$
                        </button>
                    </div>
                    <button class="mt-6 w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg border border-white">
                        Continuar
                    </button>
                </div>

                <!-- Imagen 2 -->
                <div class="w-1/2 content-slide hidden">
                    <img src="{{ asset('img/seccion2-index.jpeg') }}" alt="Niños en situación de pobreza" class="object-cover rounded-lg shadow-lg w-full h-full max-h-96">
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
    
    <!-- Sección footer -->
    <footer class="bg-customDarkGray text-gray-400 py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4 text-center">
            
            <!-- ¿Quiénes somos? -->
            <div>
                <h3 class="text-customGreen font-semibold mb-4">¿Quiénes somos?</h3>
                <ul class="space-y-2">
                    <p>Education Non-Disparity</p>
                    <!-- Contenedor de redes sociales -->
                    <div class="flex flex-col justify-center items-center">
                        <ul class="flex space-x-4">
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=61556395959661" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 text-white">
                                        <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/_______end.________/" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6 text-white">
                                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/uSubLife" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 text-white">
                                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
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