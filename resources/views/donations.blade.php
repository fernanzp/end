<x-head />

<body class="bg-customLightGray">
    <!-- Estilos globales -->
    <style>
        <x-styles />
    </style>
    
    <div class="relative h-screen w-full">
        <!-- <img src="{{ asset('img/Fondo-index.jpg') }}" alt="Niña en pobreza" class="object-cover w-full h-full"> -->
        <video autoplay muted loop class="object-cover w-full h-full">
            <source src="{{ asset('video/video-donations.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <!-- Navbar -->
        <x-navbar />

        <!-- Texto Principal -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-0">
            <h1 class="merriweather-bold text-customBeige text-7xl font-bold">Transformemos vidas juntos</h1>
            <p class="text-customBeige text-2xl mt-4">Tu ayuda puede llevar esperanza y oportunidades a miles de niños y familias.</p>
        </div>
        <div class="absolute w-full flex justify-center items-center bottom-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#ECDFCC" 
                 class="w-8 h-8 smooth-bounce">
                <path d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5-12.5-32.8-12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/>
            </svg>
        </div>
    </div>
    

    <!-- Impacto, Donaciones, Comunidades -->
    <section class="text-center py-10">
        <div class="grid grid-cols-3 gap-4 max-w-4xl mx-auto">
            <div>
                <h2 class="text-4xl font-bold text-customOrange">30M</h2>
                <p class="text-lg font-semibold text-white">Humanos impactados</p>
                <img src="{{ asset('img/donaciones1-donations.png') }}" alt="Icono Humanos Impactados" class="mx-auto mt-2 w-24 h-24">
            </div>
            <div>
                <h2 class="text-4xl font-bold text-customOrange">370K</h2>
                <p class="text-lg font-semibold text-white">Dinero donado</p>
                <img src="{{ asset('img/donaciones2-donations.png') }}" alt="Icono Dinero Donado" class="mx-auto mt-2 w-24 h-24">
            </div>
            <div>
                <h2 class="text-4xl font-bold text-customOrange">100</h2>
                <p class="text-lg font-semibold text-white">Comunidades asistidas</p>
                <img src="{{ asset('img/donaciones3-donations.png') }}" alt="Icono Comunidades Asistidas" class="mx-auto mt-2 w-24 h-24">
            </div>
        </div>
    </section>

    <!-- Sección de Donación -->
    <section class="bg-customLightGray py-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="relative">
                <img src="{{ asset('img/donaciones4-donations.jpg') }}" alt="Persona pidiendo ayuda" class="w-full h-auto relative z-10">
                <div class="absolute top-0 left-0 w-full h-full bg-customGreen rounded-lg -z-10" style="transform: translate(15px, 15px);"></div>
            </div>
            <div>
                <h3 class="text-orange-500 text-lg font-bold mb-2">Conoce más sobre nosotros</h3>
                <h2 class="text-3xl font-bold mb-4 text-customGreen">Haz una donación y cambia vidas</h2>
                <p class="text-customBeige mb-4">
                    En Education Non-Disparity, luchamos por una educación de calidad y la reducción de las desigualdades. 
                    Con tu apoyo, podemos brindar oportunidades a quienes más lo necesitan. Tu donación nos ayuda a crear un futuro más justo y equitativo.
                </p>
                <ul class="text-gray-800 space-y-2">
                    <li class="inline-flex items-center gap-x-2 font-bold text-customBeige">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(71, 166, 83, 1);transform: ;msFilter:;">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                        </svg>
                        Apoya el acceso a la educación para quienes más lo necesitan.
                    </li>
                    <li class="inline-flex items-center gap-x-2 font-bold text-customBeige">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(71, 166, 83, 1);transform: ;msFilter:;">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                        </svg>
                        Sé parte de una comunidad global que lucha contra las desigualdades.
                    </li>
                    <li class="inline-flex items-center gap-x-2 font-bold text-customBeige">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(71, 166, 83, 1);transform: ;msFilter:;">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                        </svg>
                        Contribuye a un futuro con oportunidades para todos.
                    </li>
                    <li class="inline-flex items-center gap-x-2 font-bold text-customBeige">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(71, 166, 83, 1);transform: ;msFilter:;">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                        </svg>
                        Comparte tu pasión por una educación inclusiva y de calidad.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sección 2 -->
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

    <!-- Sección 3 -->
    <div class="bg-customLightGray py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-customGreen mb-8">¿Qué donamos?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Tarjeta 1: Comparte nuestra misión -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones5-donations.png') }}" alt="Comparte nuestra misión" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Material escolar</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Dona cuadernos, lápices, mochilas y otros útiles escolares para apoyar la educación de niños y jóvenes en comunidades vulnerables, facilitando su acceso a un aprendizaje de calidad.
                    </p>
                </div>

                <!-- Tarjeta 2: Donación general -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones6-donations.png') }}" alt="Donación general" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Acceso a la tecnología</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Contribuye con dispositivos electrónicos como computadoras, tablets o smartphones, permitiendo a estudiantes de bajo recursos acceder a herramientas tecnológicas para su formación y reducir la brecha digital.
                    </p>
                </div>

                <!-- Tarjeta 3: Vuélvete un voluntario -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones7-donations.png') }}" alt="Vuélvete un voluntario" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Becas educativas</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Ayuda a financiar la educación de los estudiantes en situación de vulnerabilidad. Las becas permiten a los jóvenes continuar su formación académica y alcanzar nuevas oportunidades que de otro modo no estarían a su alcance.
                    </p>
                </div>

                <!-- Tarjeta 4: Forma parte de las actividades -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones8-donations.png') }}" alt="Forma parte de las actividades" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Ropa y calzado escolar</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Dona uniformes y calzado escolar para garantizar que los estudiantes tengan lo necesario para asistir a clases sin preocupaciones materiales, promoviendo la igualdad entre ellos y reduciendo las barreras que impiden su aprendizaje.
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
    <!--Cambio de usuario-->
    <x-modal_change_user />
    <!--Chat-->
    <x-chat_global />

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