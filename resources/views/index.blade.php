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
            a::after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 50%;
                width: 0%;
                height: 2px;
                background-color: white; /* Línea de color blanco */
                transition: width 400ms cubic-bezier(0.25, 0.8, 0.25, 1), left 400ms cubic-bezier(0.25, 0.8, 0.25, 1);
            }

            a:hover::after,
            a:focus::after {
                width: 100%;
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
        <nav class="absolute top-0 w-full z-10">
            <ul class="flex justify-center space-x-8 p-4 bg-transparent text-white">
                <li class="list-none">
                    <a href="#" class="relative text-white transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">
                        Inicio
                    </a>
                </li>
                <li class="list-none">
                    <a href="#" class="relative text-white transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">
                        Actividades
                    </a>
                </li>
                <li class="list-none">
                    <a href="#" class="relative text-white transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">
                        Donaciones
                    </a>
                </li>
                <li class="list-none">
                    <a href="#" class="relative text-white transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">
                        Perfil
                    </a>
                </li>
            </ul>
        </nav>

        <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-0">
            <h1 class="text-white text-5xl font-bold">Transformemos vidas juntos</h1>
            <p class="text-white text-lg mt-4">Tu ayuda puede llevar esperanza y oportunidades a miles de niños y familias.</p>
        </div>
    </div>
    
    <!-- Sección 2 -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto flex flex-row items-center justify-between space-x-8 px-4">
            <div class="w-1/2">
                <h1 class="text-4xl font-bold text-black leading-tight mb-4">
                    Únete a la Lucha contra la Pobreza y la Desigualdad
                </h1>
                <h2 class="text-lg font-semibold text-gray-600 mb-6">
                    Tu apoyo puede marcar la diferencia
                </h2>
                <p class="text-gray-700 text-base text-justify leading-relaxed">
                    En nuestra ONG, trabajamos incansablemente para reducir la pobreza y la desigualdad promoviendo educación de calidad y creando oportunidades para quienes más lo necesitan. Sin embargo, no podemos hacerlo solos. Necesitamos tu ayuda.
                </p>
            </div>

            <div class="w-1/2">
                <img src="{{ asset('img/Fondo2-index.png') }}" alt="Niño en situación de pobreza" class="object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </div>

    <!-- Sección: Cómo puedes apoyar -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-black mb-8">¿Cómo puedes apoyar?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <div class="text-center p-4 bg-white shadow-md rounded-lg">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen1-index.png') }}" alt="Comparte nuestra misión" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-black mb-2">Comparte nuestra misión</h3>
                    <p class="text-gray-700 text-sm text-justify">
                        Difunde nuestra causa entre tu red de contactos y en redes sociales. Cuantas más personas conozcan nuestro trabajo, más impacto podemos tener.
                    </p>
                </div>
                
                <div class="text-center p-4 bg-white shadow-md rounded-lg">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen2-index.png') }}" alt="Donación general" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-black mb-2">Donación general</h3>
                    <p class="text-gray-700 text-sm text-justify">
                        Cada contribución cuenta. Con tu aporte, podemos continuar nuestros proyectos de educación, desarrollo y asistencia a comunidades vulnerables.
                    </p>
                </div>
                
                <div class="text-center p-4 bg-white shadow-md rounded-lg">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen3-index.png') }}" alt="Vuélvete un voluntario" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-black mb-2">Vuélvete un voluntario</h3>
                    <p class="text-gray-700 text-sm text-justify">
                        Únete a nuestros esfuerzos como voluntario y ayuda directamente en nuestras iniciativas.
                    </p>
                </div>
                
                <div class="text-center p-4 bg-white shadow-md rounded-lg">
                    <div class="mb-4">
                        <img src="{{ asset('img/imagen4-index.png') }}" alt="Forma parte de las actividades" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-black mb-2">Forma parte de las actividades</h3>
                    <p class="text-gray-700 text-sm text-justify">
                        Asiste a eventos, talleres y campañas que organizamos para concienciar sobre la pobreza y la desigualdad. Tu participación activa puede inspirar a otros y contribuir al cambio.
                    </p>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Sección footer -->
    <footer class="bg-gray-800 text-gray-400 py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4 text-center">
            
            <!-- ¿Quiénes somos? -->
            <div>
                <h3 class="text-white font-semibold mb-4">¿Quiénes somos?</h3>
                <ul class="space-y-2">
                    <!-- <li><a href="#" class="hover:underline">Conviértete en beneficiario</a></li>
                    <li><a href="#" class="hover:underline">Conviértete en donante</a></li>
                    <li><a href="#" class="hover:underline">Conviértete en voluntario</a></li> -->
                </ul>
            </div>
            
            <!-- Únete a nuestra ONG -->
            <div>
                <h3 class="text-white font-semibold mb-4">Únete a nuestra ONG</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="relative transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">Conviértete en beneficiario</a></li>
                    <li><a href="#" class="relative transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">Conviértete en donante</a></li>
                    <li><a href="#" class="relative transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:text-gray-300">Conviértete en voluntario</a></li>
                </ul>
            </div>
            
            <!-- Información de contacto -->
            <div>
                <h3 class="text-white font-semibold mb-4">Información de contacto</h3>
                <p>Education Non-Disparity</p>
                <p>Correo: info@EducationNon-Disparity.org</p>
                <p>Tel: +54 91 123 4567</p>
                <p>Horario: Lunes a Viernes, 9:00A.M - 18:00P.M</p>
            </div>
            
        </div>
    </footer>
    
</body>
</html>