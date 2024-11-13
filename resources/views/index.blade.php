<x-head />

<body class="bg-customDarkGray">
    <!-- Estilos globales -->
    <style>
        <x-styles />
        
        .active-tab {
            border-bottom: 2px solid #1D4ED8;
            /* Color azul para la pestaña activa */
            color: #1D4ED8;
            /* Color del texto de la pestaña activa */
        }
    </style>

    <!--Sección de inicio-->
    <div class="relative h-screen w-full">
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

    <!--Sección ¿Quiénes somos? 2?-->
    <div class="bg-customDarkGray px-40 py-32 flex flex-col items-center justify-center">
        <!--Subsección 1 | ¿Quiénes somos?-->
        <div class="w-full flex justify-between items-center">
            <div class="w-[40%] flex justify-center">
                <img src="{{ asset('img/logo.png') }}" alt="Imagen representativa" class="w-full h-auto">
            </div>
            <div class="w-[50%] flex items-center">
                <div class="w-full">
                    <p class="merriweather-bold font-bold text-customGreen text-5xl mb-12">¿Quiénes somos?</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Impulsamos el derecho a la educación para todos.</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">En Education Non Disparity, trabajamos para crear un camino hacia una educación digna y de calidad, especialmente para quienes han sido excluidos de ella. Creemos que cada persona, sin importar su origen o situación, merece la oportunidad de aprender y desarrollarse plenamente.</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Nos impulsa nuestra comunidad.</p>
                    <p class="text-customBeige text-xl text-justify">Ponemos a las personas en el centro de cada acción que emprendemos. A través de nuestros programas, talleres y eventos, buscamos empoderar a estudiantes y comunidades, ofreciendo herramientas y oportunidades que promuevan su crecimiento. La educación cambia vidas, y nosotros nos dedicamos a acercarla a todos.</p>
                </div>
            </div>
        </div>
        <!--Subsección 2 | Nuestros valores-->
        <div class="w-full">

        </div>
    </div>

    <!--Sección ¿Quiénes somos?
    <div class="bg-customDarkGray p-32 flex flex-col items-center justify-center">-->
        <!--Subsección 1 | ¿Quiénes somos?
        <p class="merriweather-bold font-bold text-customGreen text-4xl mb-12">¿Quiénes somos?</p>
        <div class="w-full flex justify-between">
            <div class="w-[40%] flex items-center">
                <div class="w-full">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Impulsamos el derecho a la educación para todos.</p>
                    <p class="text-customBeige text-xl mb-12">En Education Non Disparity, trabajamos para crear un camino hacia una educación digna y de calidad, especialmente para quienes han sido excluidos de ella. Creemos que cada persona, sin importar su origen o situación, merece la oportunidad de aprender y desarrollarse plenamente.</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Nos impulsa nuestra comunidad.</p>
                    <p class="text-customBeige text-xl">Ponemos a las personas en el centro de cada acción que emprendemos. A través de nuestros programas, talleres y eventos, buscamos empoderar a estudiantes y comunidades, ofreciendo herramientas y oportunidades que promuevan su crecimiento. La educación cambia vidas, y nosotros nos dedicamos a acercarla a todos.</p>
                </div>
            </div>
            <div class="w-1/2 flex justify-center">
                <img src="{{ asset('img/who_we_are_img.jpg') }}" alt="Imagen representativa" class="w-full h-auto">
            </div>
        </div>-->
        <!--Subsección 2 | Nuestros valores
        <div class="w-full">

        </div>
    </div>-->


    <!-- Sección ¿cómo puedes ayudar? -->
    <div class="bg-customDarkGray pb-32 px-48">
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

            <!-- Tarjeta 4: Forma parte de nuestros programas -->
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
    
    <!-- Footer -->
    <x-footer />
</body>
</html>
    
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