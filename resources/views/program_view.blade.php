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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body class="relative h-screen w-full bg-customDarkGray">
    <!-- Estilos globales -->
    <style>
        <x-ahoverstyles />
    </style>

    <style>
        /* Estilo inicial del icono (invisible y pequeño) */
        .donation-icon {
            opacity: 0;
            transform: scale(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Al hacer hover en el div, hacemos que el icono sea visible y crezca */
        .bg-customLighterGray:hover .donation-icon {
            opacity: 1;
            transform: scale(1);
        }
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

            <p class="text-2xl text-customBeige font-bold mb-1">Ubicación:</p>
            <p class="text-gray-400 text-xl mb-4">{{ $program->place }}</p>


            <div class="flex items-center mb-6 text-gray-400 transition-colors duration-300 hover:text-gray-500 cursor-pointer text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" class="w-8 h-8 mr-4">
                    <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152l0 270.8c0 9.8-6 18.6-15.1 22.3L416 503l0-302.6zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6l0 251.4L32.9 502.7C17.1 509 0 497.4 0 480.4L0 209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77l0 249.3L192 449.4 192 255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                </svg>
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($program->place) }}" target="_blank" class="text-xl">Ver en el mapa</a>

            </div>

            <button id="modal-btn" class="w-full bg-transparent text-white text-xl font-bold py-5 px-6 border-customGreen border-4 rounded-full transition-colors duration-300 hover:bg-customGreen transition">Inscríbete ahora</button>
            <!--<button class="w-full bg-customBeige text-customDarkGray text-xl font-bold py-5 px-6 rounded-lg transition-colors duration-300 hover:bg-customDarkBeige transition">Inscríbete en la fecha programada</button>-->
        </div>


        <!--Nuevo programa-->
        <x-newprogram />




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
            <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Descripción:</p>
            <p class="text-customBeige text-xl mb-10 text-justify">{{ $program->description }}</p>
            <!--Detalles del programa-->
            <div class="mb-10">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Detalles del programa:</p>
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Modalidad:</span> <span class="text-customBeige text-xl">{{ ucfirst($program->modality) }}</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Días de la semana:</span> <span class="text-customBeige text-xl">Lunes, Miércoles y Viernes</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Horario:</span> <span class="text-customBeige text-xl">10 a.m. - 2:00 p.m.</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Edad:</span> <span class="text-customBeige text-xl">{{ $program->age }}</span></p>
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Capacidad de beneficiarios:</span> <span class="text-customBeige text-xl">80</span></p> 
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Capacidad de voluntarios:</span> <span class="text-customBeige text-xl">12</span></p>
                <p class="text-customBeige text-xl mb-4 text-justify"><span class="font-bold">Ubicación:</span> <span class="text-customBeige text-xl">{{ $program->place }}</span></p>

            </div>
            <!--Objetivo-->
            <div class="mb-10">
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Objetivo:</p>
                <p class="text-customBeige text-xl text-justify">{{ $program->objetive }}</p>
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
            <!--Mini mapa-->
            <div id="map" class="w-full h-full bg-gray-200 rounded-lg mb-[5%]"></div>
            <!-- Beneficiarios inscritos-->
            <p class="merriweather-bold font-bold text-customGreen text-2xl mb-2">Beneficiarios inscritos:</p>
            <div class="w-full bg-customBeige h-[12%] rounded-full mb-12">
                <!-- Barra de progreso -->
                <div class="bg-customGreen h-full rounded-full relative mb-1 progress-bar" data-percentage="70">
                    <span class="absolute inset-0 flex items-center justify-center text-customBeige font-bold text-xl">70%</span>
                </div>
               <p class="text-customBeige text-md ml-[2.5%]">Lugares disponibles: 30</p> 
            </div>
            <!--Voluntarios inscritos-->
            <p class="merriweather-bold font-bold text-customGreen text-2xl mb-2">Voluntarios inscritos:</p>
            <div class="w-full bg-customBeige h-[12%] rounded-full mb-[10%]">
                <!-- Barra de progreso -->
                <div class="bg-customGreen h-full rounded-full relative mb-1 progress-bar" data-percentage="41.67">
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
            <div class="bg-customLighterGray p-6 rounded-lg shadow-lg text-center relative">
                <!-- SVG oculto inicialmente con transición de visibilidad -->
                <div class="donation-icon absolute -top-5 -left-5 opacity-0 scale-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#1ab76a" class="w-16 h-16"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3l-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 91.9c-11.1 0-20.1 9-20.1 20.1l0 6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.7 4c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9c0 0 0 0 0 0s0 0 0 0s0 0 0 0c-2.2-.7-4.3-1.5-6.4-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1l0 6.4c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1l0-5.5c5.3-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4l0-6.3c0-11.1-9-20.1-20.1-20.1zM48 352l16 0c19.5 25.9 44 47.7 72.2 64L64 416l0 32 192 0 192 0 0-32-72.2 0c28.2-16.3 52.8-38.1 72.2-64l16 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48z"/></svg>
                </div>
                <div class="donation-icon absolute -bottom-5 -right-5 opacity-0 scale-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#1ab76a" class="w-20 h-20"><path d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z"/></svg>
                </div>
                
                <!-- Contenido del apartado de donación -->
                <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">¡Ayúdanos a llegar a más personas!</p>
                <p class="text-customBeige text-lg mb-6">
                    Con tu apoyo, podemos cambiar vidas y crear un mundo con más oportunidades para todos. 
                    ¡Cada donación hace la diferencia y acerca a más personas a una educación digna!
                </p>
                <button id="donarBtn" class="bg-transparent text-customBeige font-bold py-2 px-6 rounded-full border-customGreen border-4 transition-colors duration-300 hover:bg-customGreen">Donar Ahora</button>
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
    </div>

    <!--Sección: Te interesa participar?-->
    <div class="bg-customDarkGray h-auto flex flex-col items-center justify-center px-32 pb-32">
        <p class="merriweather-bold font-bold text-customGreen text-5xl text-center mb-8">¿Te interesa participar?</p>
        <div class="flex w-full justify-around">
            <button class="w-[40%] bg-transparent text-white text-xl font-bold py-5 px-6 border-customGreen border-4 rounded-full transition-colors duration-300 hover:bg-customGreen transition">Inscríbete como beneficiario</button>
            <button class="w-[40%] bg-transparent text-white text-xl font-bold py-5 px-6 border-customGreen border-4 rounded-full transition-colors duration-300 hover:bg-customGreen transition">Inscríbete como voluntario</button>
        </div>
    </div>

    <!--Más programas-->
    <div class="bg-customDarkGray h-auto flex flex-wrap px-32">
        <p class="merriweather-bold font-bold text-customGreen text-2xl mb-4">Más programas</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($recentPrograms as $recentProgram)
                <x-program-card :program="$recentProgram" />
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <x-footer />
</body>
</html>

<!-- Script de Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnPhXNZwg1HmdhWo7ECKUe_4YY7vMcT7Q&callback=initMap" async defer></script>

<script>
    function initMap() {
        // Obtener las coordenadas desde los datos de la actividad
        const location = {
            lat: {{ $program->latitude }},
            lng: {{ $program->longitude }}
        };

        // Crear el mapa y centrarlo en la ubicación específica de la actividad
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

<!--Script para el modal de "Inscribirse ahora que en realidad es para crear un programa-->

<script>
    // Seleccionar el botón y el modal
const modalBtn = document.getElementById('modal-btn');
const modal = document.getElementById('modal');

// Abrir el modal cuando se hace clic en el botón
modalBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Función para cerrar el modal
function closeModal() {
    modal.classList.add('hidden');
}

// Función para enviar el formulario (puedes agregar la lógica de envío aquí)
function submitForm() {
    alert('Formulario enviado');
    closeModal();
}
    </script>



<!-- Google Places API for autocomplete -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnPhXNZwg1HmdhWo7ECKUe_4YY7vMcT7Q&libraries=places&callback=initAutocomplete" async defer></script>

<script>
  // Función para inicializar el autocompletado
  function initAutocomplete() {
    const direccionInput = document.getElementById("place");

    const autocomplete = new google.maps.places.Autocomplete(direccionInput, {
      types: ['geocode', 'establishment'], // Permitir tanto direcciones como establecimientos
      componentRestrictions: { country: "mx" } // Restricción solo al país
    });

    // Escuchar el evento de selección de lugar
    autocomplete.addListener("place_changed", () => {
      const place = autocomplete.getPlace();
      if (place.geometry) {
        console.log("Coordenadas:", place.geometry.location.lat(), place.geometry.location.lng());
      } else {
        console.log("No se pudo obtener información de ubicación.");
      }
    });
  }

  // Función para obtener coordenadas a partir de una dirección
  function obtenerCoordenadas() {
    const direccion = document.getElementById("direccion").value;
    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'address': direccion }, function(results, status) {
      if (status === 'OK') {
        const location = results[0].geometry.location;
        console.log("Coordenadas: ", location.lat(), location.lng());
      } else {
        console.log("Geocodificación fallida debido a: " + status);
      }
    });
  }

  // Evitar el envío del formulario y llamar a la función de obtener coordenadas
  document.querySelector("form.rellenar").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario
    obtenerCoordenadas(); // Llama a la función para obtener coordenadas
  });
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

<!--Animación de los graficos-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const progressBars = document.querySelectorAll('.progress-bar');
    
        const animateBars = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const percentage = parseFloat(bar.getAttribute('data-percentage'));
                    const span = bar.querySelector('span');
                    
                    // Animar el ancho de la barra
                    bar.style.transition = 'width 1.5s ease-in-out';
                    bar.style.width = percentage + '%';
    
                    // Animar el conteo del número
                    let currentNumber = 0;
                    const increment = percentage / 60; // Ajuste de velocidad para animación suave
                    
                    const countUp = setInterval(() => {
                        currentNumber += increment;
                        if (currentNumber >= percentage) {
                            currentNumber = percentage;
                            clearInterval(countUp); // Detener la animación
                        }
                        span.textContent = currentNumber.toFixed(0) + '%';
                    }, 25); // Actualizar cada 25 ms para una animación suave
                    
                    observer.unobserve(bar); // Dejar de observar la barra después de animar
                }
            });
        };
    
        const observer = new IntersectionObserver(animateBars, { threshold: 0.5 });
    
        progressBars.forEach(bar => {
            bar.style.width = '0%'; // Iniciar con ancho de 0%
            observer.observe(bar);
        });
    });
</script>