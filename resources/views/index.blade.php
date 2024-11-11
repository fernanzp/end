<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>END</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-customLightGray">
    <!-- Estilos globales -->
    <style>
        <x-ahoverstyles />
    </style>
    <style>
        .active-tab {
            border-bottom: 2px solid #1D4ED8;
            /* Color azul para la pestaña activa */
            color: #1D4ED8;
            /* Color del texto de la pestaña activa */
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
        <x-navbar />

        <!-- Texto Principal -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center z-0">
            <h1 class="merriweather-bold text-customBeige text-7xl font-bold">Transformemos vidas juntos</h1>
            <p class="text-customBeige text-2xl mt-4">Tu ayuda puede llevar esperanza y oportunidades a miles de niños y
                familias.</p>
        </div>
        <div class="absolute w-full flex justify-center items-center bottom-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#ECDFCC" 
                 class="w-8 h-8 smooth-bounce">
                <path d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5-12.5-32.8-12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/>
            </svg>
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
                    <h1 class="merriweather-bold text-4xl font-bold text-customGreen leading-tight mb-4">
                        Únete a la Lucha contra la Pobreza y la Desigualdad
                    </h1>
                    <h2 class="text-2xl font-semibold text-customBeige mb-6">
                        Tu apoyo puede marcar la diferencia
                    </h2>
                    <p class="text-1xl text-customBeige text-base text-justify leading-relaxed">
                        En nuestra ONG, trabajamos incansablemente para reducir la pobreza y la desigualdad promoviendo
                        educación de calidad y creando oportunidades para quienes más lo necesitan. Sin embargo, no
                        podemos hacerlo solos. Necesitamos tu ayuda.
                    </p>
                </div>

                <!-- Imagen 1 -->
                <div class="w-1/2 content-slide h-full">
                    <img src="{{ asset('img/Fondo2-index.png') }}" alt="Niño en situación de pobreza"
                        class="object-cover rounded-lg shadow-lg w-full h-full">
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
                    <!-- Modal Trigger: Botón Donar -->
                    <button id="donarBtn"
                        class="mt-6 w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg border border-white">
                        Donar
                    </button>

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

                <!-- Imagen 2 -->
                <div class="w-1/2 content-slide hidden h-full">
                    <img src="{{ asset('img/seccion2-index.jpeg') }}" alt="Niños en situación de pobreza"
                        class="object-cover rounded-lg shadow-lg w-full h-full">
                </div>
            </div>

            <!-- Botones de navegación -->
            <button id="prev"
                class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-full">
                &#10094;
            </button>
            <button id="next"
                class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-full">
                &#10095;
            </button>
        </div>
    </div>

    <!-- Sección cómo puedes apoyar -->
    <div class="bg-customLightGray py-12">
        <div class="container mx-auto px-4">
            <h2 class="merriweather-bold text-4xl font-bold text-center text-customGreen mb-8">¿Cómo puedes ayudar?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Tarjeta 1: Comparte nuestra misión -->
                <div
                    class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/share-img-index.png') }}" alt="Comparte nuestra misión" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Comparte nuestra misión</h3>
                    <p class="text-customBeige text-sm text-center">
                        Ayúdanos a llegar a más personas compartiendo nuestra causa. Cuantas más personas conozcan nuestro trabajo, más impacto podemos tener.
                    </p>
                </div>

                <!-- Tarjeta 2: Donación general -->
                <div
                    class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/donate-img-index.png') }}" alt="Donación general" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Donación general</h3>
                    <p class="text-customBeige text-sm text-center">
                        Cada contribución cuenta. Gracias a tu apoyo, podemos seguir impulsando proyectos educativos, de desarrollo y ayuda a quienes más lo necesitan.
                    </p>
                </div>

                <!-- Tarjeta 3: Vuélvete un voluntario -->
                <div
                    class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/volunteers-img-index.png') }}" alt="Vuélvete un voluntario" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Vuélvete un voluntario</h3>
                    <p class="text-customBeige text-sm text-center">
                        Sé parte del cambio. Únete como voluntario y contribuye activamente a nuestros programas e iniciativas.
                    </p>
                </div>

                <!-- Tarjeta 4: Forma parte de las actividades -->
                <div
                    class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105">
                    <div class="mb-4">
                        <img src="{{ asset('img/programs-img-index.png') }}" alt="Forma parte de las actividades" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Forma parte de nuestros programas</h3>
                    <p class="text-customBeige text-sm text-center">
                        Participa en nuestros eventos, talleres y campañas para sensibilizar sobre la educación y la desigualdad. Tu apoyo inspira a otros y fortalece el cambio social.
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

</body>
</html>