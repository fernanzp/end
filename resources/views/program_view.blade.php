<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>END</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body class="relative h-screen w-full bg-customDarkGray">
    <!-- Estilos globales -->
    <style>
        <x-ahoverstyles />
    </style>

    <img src="{{ asset('img/programs_images/' . $program->img) }}" alt="Niña en pobreza" class="object-cover w-full h-full">
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <div class="absolute top-8 left-8 flex items-center text-customBeige text-xl z-20">
        <a href="{{ url('/programs') }}" class="flex items-center hover:text-customDarkBeige">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Regresar
        </a>
    </div>

    <div class="absolute inset-0 flex items-center z-10 px-10 w-full">
        <div class="text-center w-[70%]">
            <h1 class="merriweather-bold text-customBeige text-7xl font-bold leading-tight">{{ $program->title }}</h1>
            <!--<p class="text-white text-4xl mt-8">Ayudando a romper el ciclo de la desigualdad</p>-->
        </div>

        <div class="w-[20%] p-8 mx-10 bg-customDarkGray rounded-xl shadow-lg">
            <p class="text-2xl text-customBeige font-bold mb-1">Inicia:</p>
            <p class="text-gray-400 text-xl mb-4">{{ ucfirst(\Carbon\Carbon::parse($program->start_date)->locale('es')->translatedFormat('l d \\d\\e F \\d\\e\\l Y')) }}</p>
            <p class="text-2xl text-customBeige font-bold mb-1">Finaliza:</p>
            <p class="text-gray-400 text-xl mb-4">{{ ucfirst(\Carbon\Carbon::parse($program->end_date)->locale('es')->translatedFormat('l d \\d\\e F \\d\\e\\l Y')) }}</p>

            <div class="flex items-center mb-8 text-customGreen transition-colors duration-300 hover:text-customDarkGreen cursor-pointer text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="w-8 h-8 mr-4">
                    <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/>
                </svg>
                <a href="#" class="text-xl">Ver el calendario</a>
            </div>

            <p class="text-2xl text-customBeige font-bold mb-1">Lugar:</p>
            <p class="text-gray-400 text-xl mb-4">Centro comunitario "Educando para el Futuro"</p>

            <div class="flex items-center mb-6 text-gray-400 transition-colors duration-300 hover:text-gray-500 cursor-pointer text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" class="w-8 h-8 mr-4">
                    <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152l0 270.8c0 9.8-6 18.6-15.1 22.3L416 503l0-302.6zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6l0 251.4L32.9 502.7C17.1 509 0 497.4 0 480.4L0 209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77l0 249.3L192 449.4 192 255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                </svg>
                <button class="text-xl">Ver en el mapa</button>
            </div>

            <button class="w-full bg-transparent text-white text-xl font-bold py-5 px-6 border-customGreen border-4 rounded-lg transition-colors duration-300 hover:bg-customGreen transition">Inscríbete ahora</button>
            <!--<button class="w-full bg-customBeige text-customDarkGray text-xl font-bold py-5 px-6 rounded-lg transition-colors duration-300 hover:bg-customDarkBeige transition">Inscríbete en la fecha programada</button>-->
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 flex justify-center items-center bottom-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#ECDFCC" 
                 class="w-8 h-8 smooth-bounce">
                <path d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5-12.5-32.8-12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/>
            </svg>
        </div>
    </div>

    <!-- Contenedor de los detalles del programa-->
    <div class="bg-customDarkGray h-auto p-32 flex gap-8 flex-wrap">
        <div class="w-full md:w-[50%]">
            <!--Descripción-->
            <p class="text-customBeige text-xl mb-10 text-justify">{{ $program->description }}</p>
            <!--Detalles del programa-->
            <div class="mb-10">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Detalles del programa:</p>
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Modalidad:</span> <span class="text-customBeige text-xl">Presencial</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Días de la semana:</span> <span class="text-customBeige text-xl">Lunes, Miércoles y Viernes</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Horario:</span> <span class="text-customBeige text-xl">10 a.m. - 2:00 p.m.</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Edad:</span> <span class="text-customBeige text-xl">15 - 40 años</span></p>
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Capacidad de beneficiarios:</span> <span class="text-customBeige text-xl">80</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Capacidad de voluntarios:</span> <span class="text-customBeige text-xl">12</span></p>
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Ubicación:</span> <span class="text-customBeige text-xl">Centro comunitario "Educando para el Futuro", Av. de la Solidaridad, Ciudad de México</span></p>
            </div>
            <!--Objetivo-->
            <div class="mb-10">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Objetivo:</p>
                <p class="text-customBeige text-xl text-justify">El programa tiene como objetivo proporcionar herramientas educativas y técnicas para mejorar las oportunidades laborales de los participantes, con la esperanza de mejorar sus condiciones de vida y contribuir al desarrollo social de su comunidad.</p>
            </div>
            <!-- Contenidos -->
            <div class="mb-10">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Contenidos:</p>
                <ul class="list-disc list-inside text-customBeige text-xl mb-4 space-y-2 text-justify">
                    <li>Clases de matemáticas y ciencias básicas</li>
                    <li>Talleres de habilidades técnicas como carpintería, costura, tecnología básica</li>
                    <li>Cursos de alfabetización digital</li>
                    <li>Actividades de desarrollo personal y liderazgo</li>
                </ul>
            </div>
            <!--Requisitos-->
            <div class="mb-10">

            </div>
        </div>
        <div class="w-full md:w-[35%] h-64 md:ml-auto">
            <div id="map" class="w-full h-full bg-gray-200 rounded-lg mb-[5%]"></div>
            <!-- Beneficiarios inscritos-->
            <p class="merriweather-bold font-bold text-customGreen text-2xl mb-2">Beneficiarios inscritos:</p>
            <div class="w-full bg-customBeige h-[12%] rounded-full mb-12">
                <!-- Barra de progreso -->
                <div class="bg-customGreen h-full rounded-full relative mb-1" style="width: 70%;">
                    <span class="absolute inset-0 flex items-center justify-center text-customBeige font-bold text-xl">70%</span>
                </div>
               <p class="text-customBeige text-md ml-[2.5%]">Lugares disponibles: 30</p> 
            </div>
            <!--Voluntarios inscritos-->
            <p class="merriweather-bold font-bold text-customGreen text-2xl mb-2">Voluntarios inscritos:</p>
            <div class="w-full bg-customBeige h-[12%] rounded-full mb-[10%]">
                <!-- Barra de progreso -->
                <div class="bg-customGreen h-full rounded-full relative mb-1" style="width: 41.67%;">
                    <span class="absolute inset-0 flex items-center justify-center text-customBeige font-bold text-xl">41.67%</span>
                </div>
                <p class="text-customBeige text-md ml-[2.5%]">Lugares disponibles: 7</p>
            </div>
            <!--Financiamiento-->
            <div class="mb-10">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Financiamiento:</p>
                <p class="text-customBeige text-xl text-justify">El programa se llevará a cabo gracias a la generosidad de nuestros donantes. $50,000 MXN serán destinados a la implementación de este programa, cubriendo materiales educativos, salarios de los instructores, y los costos operativos del centro educativo.</p>
            </div>
            <!-- Apartado de Donación -->
            <div class="bg-customLighterGray p-6 rounded-lg shadow-lg text-center">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">¡Ayúdanos a llegar a más personas!</p>
                <p class="text-customBeige text-lg mb-6">
                    Con tu apoyo, podemos cambiar vidas y crear un mundo con más oportunidades para todos. 
                    ¡Cada donación hace la diferencia y acerca a más personas a una educación digna!
                </p>
                <!--<button class="w-full bg-transparent text-white text-xl font-bold py-5 px-6 border-customGreen border-4 rounded-lg transition-colors duration-300 hover:bg-customGreen transition">Inscríbete ahora</button>-->
                <button id="donarBtn" class="bg-transparent text-customBeige font-bold py-2 px-6 rounded-full border-customGreen border-4 transition-colors duration-300 hover:bg-customGreen transition">Donar Ahora</button>
            </div>
            <!-- Modal -->
            <div id="donationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                        <!-- Close Button -->
                        <button id="closeModal"
                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">×</button>

                        <h2 class="text-2xl md:text-3xl font-bold text-customGreen mb-4">Selecciona una opción
                            de donación</h2>

                        <!-- Tabs Navigation -->
                        <div class="border-b mb-6">
                            <ul class="flex justify-center">
                                <li class="mr-1">
                                    <a href="#" id="tab-socio"
                                        class="bg-white inline-block py-2 px-4 text-gray-500 hover:text-blue-500">Soy
                                        socio o donante</a>
                                </li>
                                <li class="mr-1">
                                    <a href="#" id="tab-anonimo"
                                        class="bg-white inline-block py-2 px-4 text-gray-500 hover:text-blue-500">Donativo
                                        anónimo</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Description of each donation type -->
                        <div id="description" class="text-gray-700 text-sm mb-4">
                            <!-- Default description (Socio) -->
                            <p>Donar como socio te permite acceder a beneficios exclusivos y participar en
                                nuestras decisiones. Ingresa tu correo y usuario.</p>
                        </div>

                        <!-- Forms -->
                        <div id="form-socio" class="tab-content">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">Soy socio o donante</h3>

                            <!-- Verificar si el usuario está autenticado -->
                            @auth
                                <!-- Mostrar mensaje y botón de donar cuando está autenticado -->
                                <p class="text-gray-700 mb-4">Estás donando como
                                    <strong>{{ Auth::user()->name }}</strong>.
                                </p>
                                <div id="donate-button-container">
                                    <div id="donate-button"></div>
                                    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                                    <script>
                                        PayPal.Donation.Button({
                                            env: 'sandbox',
                                            hosted_button_id: 'CUQZLDN7Q48XQ',
                                            image: {
                                                src: 'https://www.paypalobjects.com/es_XC/i/btn/btn_donate_LG.gif',
                                                alt: 'Donar con el botón PayPal',
                                                title: 'PayPal - The safer, easier way to pay online!',
                                            },
                                            onComplete: function(params) {
                                                fetch('{{ route('getTransactions') }}', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                            'content')
                                                    },
                                                    body: JSON.stringify({
                                                        status: params.st,
                                                        amount: params.amt,
                                                        currency: params.cc,
                                                        transaction_id: params.tx,
                                                    })
                                                }).then(response => {
                                                    if (response.ok) {
                                                        //redireccionar a la página de agradecimiento
                                                        window.location.href = './gracias/' + params.tx;
                                                    } else {
                                                        alert('Error al procesar la donación');
                                                    }
                                                });
                                            },
                                        }).render('#donate-button');
                                    </script>
                                </div>
                            @else
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <!-- Mostrar formulario de inicio de sesión cuando no está autenticado -->
                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                        for="email">Email</label>
                                    <input id="email" type="text" name="email" required
                                        placeholder="Correo electrónico"
                                        class="w-full mb-3 px-4 py-2 border border-gray-300 rounded-lg">

                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                        for="passwordSocio">Contraseña:</label>
                                    <input id="password" type="password" name="password" required
                                        placeholder="Contraseña"
                                        class="w-full mb-3 px-4 py-2 border border-gray-300 rounded-lg">

                                    <input id="socioDonarBtn"
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg"
                                        type="submit" value="Iniciar Sesión" name="btnIngresar">
                                </form>


                                <div class="mt-4">
                                    <a href="#" class="text-blue-500 hover:underline text-sm">Recuperar mi
                                        contraseña</a><br>
                                    <a href="{{route('register')}}" class="text-blue-500 hover:underline text-sm">Regístrate
                                        ahora</a>
                                </div>
                            @endauth
                        </div>

                        <div id="form-anonimo" class="hidden tab-content">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">Donativo anónimo</h3>
                                <div id="donate-button-container-anonimo">
                                    <div id="donate-button-anonimo"></div>
                                    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                                    <script>
                                        PayPal.Donation.Button({
                                            env: 'sandbox',
                                            hosted_button_id: 'CUQZLDN7Q48XQ',
                                            image: {
                                                src: 'https://www.paypalobjects.com/es_XC/i/btn/btn_donate_LG.gif',
                                                alt: 'Donar con el botón PayPal',
                                                title: 'PayPal - The safer, easier way to pay online!',
                                            },
                                            onComplete: function(params) {
                                                fetch('{{ route('getTransactionsAnonimo') }}', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                            'content')
                                                    },
                                                    body: JSON.stringify({
                                                        status: params.st,
                                                        amount: params.amt,
                                                        currency: params.cc,
                                                        transaction_id: params.tx,
                                                    })
                                                }).then(response => {
                                                    if (response.ok) {
                                                        //redireccionar a la página de agradecimiento
                                                        window.location.href = './gracias/' + params.tx;
                                                    } else {
                                                        alert('Error al procesar la donación');
                                                    }
                                                });
                                            },
                                        }).render('#donate-button-anonimo');
                                    </script>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna izquierda -->
        <!--<div class="bg-customLighterGray p-6 flex flex-col justify-center m-4 rounded-lg">
            <h2 class="text-customGreen text-4xl font-bold mb-4">Descripción de la actividad</h2>
            <p class="text-customBeige text-xl mb-6 text-justify">{{ $program->description }}</p>
            <h3 class="text-customGreen text-3xl font-bold mb-4">Fechas y horas</h3>
            <p class="text-customBeige text-xl mb-2">Horario del sábado: 7PM - 10PM</p>
            <p class="text-customBeige text-xl mb-6">Horario del domingo: 10AM - 3PM</p>
        </div>-->

        <!-- Columna derecha -->
        <!--<div class="bg-customLighterGray p-6 m-4 rounded-lg">
            <h3 class="text-customGreen text-4xl font-bold mb-4 text-center">Ubicación de la actividad</h3>-->
            <!--<div class="w-full h-65 bg-gray-200 rounded-lg mb-4">
                <img src="{{ asset('img/actividad1-activities.jpg') }}" alt="Mapa" class="w-full h-[70%] object-cover rounded-lg">
            </div>-->
            
            <!-- Aquí se añade el contenedor para el minimapa -->
            <!--<div id="map" class="w-full h-64 bg-gray-200 rounded-lg mb-4"></div>

            <div class="mt-4">
                <h3 class="text-customGreen text-4xl font-bold">Unidos por la esperanza:</h3>
                <br>
                <p class="text-customBeige text-xl mb-4">Ayudando a romper el ciclo de la desigualdad.</p>
                <p class="text-customBeige text-xl">4728 Poplar Crescent, Residencial Sunset, Apt. 468, junto a la estación del tren, Greenville, Michigan, 46001, México</p>
            </div>
        </div>-->
    </div>

    <!-- Footer -->
    <x-footer />
</body>
</html>

<!-- Script de Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnPhXNZwg1HmdhWo7ECKUe_4YY7vMcT7Q&callback=initMap" async defer></script>
<script>
    function initMap() {
        // Coordenadas del lugar (ejemplo: Manzanillo, Colima)
        const location = { lat: 19.0536292, lng: -104.3170724 };

        // Crear el mapa y centrarlo en la ubicación
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15, // Nivel de zoom
            center: location,
        });

        // Añadir un marcador en la ubicación
        const marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
</script>


<!--Donaciones-->
<script>
    // Referencias de los elementos de las pestañas
    const tabSocio = document.getElementById('tab-socio');
    const tabAnonimo = document.getElementById('tab-anonimo');
    const formSocio = document.getElementById('form-socio');
    const formAnonimo = document.getElementById('form-anonimo');
    const description = document.getElementById('description');

    // Mostrar el modal
    document.getElementById('donarBtn').addEventListener('click', () => {
        document.getElementById('donationModal').classList.remove('hidden');
        resetTabs();
        formSocio.classList.remove('hidden'); // Mostrar formulario de Socio por defecto
        tabSocio.classList.add('active-tab');
        updateDescription('socio');
    });

    // Cerrar el modal
    document.getElementById('closeModal').addEventListener('click', () => {
        document.getElementById('donationModal').classList.add('hidden');
    });

    // Cambiar entre pestañas y prevenir el recargo
    tabSocio.addEventListener('click', (e) => {
        e.preventDefault();
        resetTabs();
        formSocio.classList.remove('hidden');
        tabSocio.classList.add('active-tab');
        updateDescription('socio');
    });

    tabAnonimo.addEventListener('click', (e) => {
        e.preventDefault();
        resetTabs();
        formAnonimo.classList.remove('hidden');
        tabAnonimo.classList.add('active-tab');
        updateDescription('anonimo');
    });

    function resetTabs() {
    formSocio.classList.add('hidden');
    formAnonimo.classList.add('hidden');
    tabSocio.classList.remove('active-tab');
    tabAnonimo.classList.remove('active-tab');
}


    function updateDescription(tab) {
        if (tab === 'socio') {
            description.innerHTML =
                '<p>Donar como socio te permite acceder a beneficios exclusivos y participar en nuestras decisiones. Ingresa tu correo y usuario.</p>';
        } else if (tab === 'anonimo') {
            description.innerHTML =
                '<p>Donar anónimamente significa que tu identidad no será registrada ni divulgada.</p>';
        }
    }
</script>