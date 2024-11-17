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
        <div class="w-full flex justify-between items-center pb-32">
            <div class="w-[40%] flex justify-center">
                <img src="{{ asset('img/logo.png') }}" alt="Imagen representativa" class="w-full h-auto">
            </div>
            <div class="w-[50%] flex items-center">
                <div class="w-full">
                    <p class="merriweather-bold font-bold text-customGreen text-6xl mb-12">¿Quiénes somos?</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Impulsamos el derecho a la educación para todos.</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">En Education Non Disparity, trabajamos para crear un camino hacia una educación digna y de calidad, especialmente para quienes han sido excluidos de ella. Creemos que cada persona, sin importar su origen o situación, merece la oportunidad de aprender y desarrollarse plenamente.</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Nos impulsa nuestra comunidad.</p>
                    <p class="text-customBeige text-xl text-justify">Ponemos a las personas en el centro de cada acción que emprendemos. A través de nuestros programas, talleres y eventos, buscamos empoderar a estudiantes y comunidades, ofreciendo herramientas y oportunidades que promuevan su crecimiento. La educación cambia vidas, y nosotros nos dedicamos a acercarla a todos.</p>
                </div>
            </div>
        </div>
        <!--Subsección 2 | Nuestros valores-->
        <div class="w-full flex flex-col">
            <p class="merriweather-bold font-bold text-customGreen text-5xl mb-12">Nuestros valores</p>
            <div class="w-full flex justify-between">
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Inclusión.</p>
                    <p class="text-customBeige text-xl mb-12">Creemos en una educación inclusiva. Abrimos nuestras puertas para que cada persona, sin importar sus antecedentes o experiencias, encuentre su lugar en nuestros programas y actividades.</p>
                </div>
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Colaboración.</p>
                    <p class="text-customBeige text-xl mb-12">Fomentamos un ambiente de aprendizaje en equipo, donde compartimos conocimiento y apoyamos a quienes lo necesitan. Nos unimos en torno a un propósito común: construir un futuro con más igualdad y menos barreras.</p>
                </div>
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Compromiso.</p>
                    <p class="text-customBeige text-xl mb-12">Estamos comprometidos con la mejora continua y el impacto positivo. Día a día, innovamos y buscamos maneras de servir mejor a nuestra comunidad, con un enfoque en el desarrollo humano y la equidad educativa.</p>
                </div>
            </div>
        </div>
    </div>

    <!--Sección ¿Qué hacemos? 2?-->
    <div class="bg-customDarkGray px-40 pb-32 flex flex-col items-center justify-center">
        <!--Subsección 1 | ¿Quiénes somos?-->
        <div class="w-full flex justify-between items-center pb-32">
            <div class="w-[50%] flex items-center">
                <div class="w-full">
                    <p class="merriweather-bold font-bold text-customGreen text-6xl mb-12">¿Qué hacemos?</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Transformamos vidas a través de la educación.</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">Nuestra misión es brindar oportunidades educativas que empoderen a personas y comunidades, conectándolas con las herramientas y el conocimiento que necesitan para alcanzar su máximo potencial. Creemos que la educación es un derecho universal y el medio más poderoso para construir un futuro con igualdad y justicia.</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Un enfoque cercano y colaborativo.</p>
                    <p class="text-customBeige text-xl text-justify">Trabajamos de la mano con nuestra comunidad y socios para entender sus necesidades y ofrecer programas adaptados a cada contexto. Nos comprometemos con cada paso del proceso: desde identificar áreas con falta de acceso educativo, hasta implementar proyectos que cambian vidas. Juntos, logramos lo que solos no podríamos alcanzar.</p>
                </div>
            </div>
            <div class="w-[40%] flex justify-center">
                <img src="{{ asset('img/what_we_do_img.jpg') }}" alt="Imagen representativa" class="w-full h-auto">
            </div>
        </div>
        <!--Subsección 2 | Nuestro enfoque-->
        <div class="w-full flex flex-col pb-16">
            <p class="merriweather-bold font-bold text-customGreen text-5xl mb-12">Nuestro enfoque</p>
            <div class="w-full flex justify-between">
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Colaboración activa.</p>
                    <p class="text-customBeige text-xl mb-12">Cada proyecto es una oportunidad para crear un cambio real. Nos mantenemos en contacto directo con los beneficiarios y aliados, adaptándonos y mejorando continuamente nuestros programas para que respondan a las verdaderas necesidades de cada comunidad.</p>
                </div>
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Orientado a las personas.</p>
                    <p class="text-customBeige text-xl mb-12">Apoyamos a quienes han sido históricamente marginados, brindando educación inclusiva y de calidad para todos. Nuestro trabajo está guiado por un compromiso profundo con el desarrollo humano y el impacto positivo en la vida de cada persona.</p>
                </div>
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Innovación en educación.</p>
                    <p class="text-customBeige text-xl mb-12">Con un enfoque dinámico, buscamos constantemente nuevas maneras de mejorar el acceso a la educación. A través de metodologías creativas e innovadoras, ofrecemos programas que inspiran, educan y empoderan, abriendo un mundo de posibilidades para las futuras generaciones.</p>
                </div>
            </div>
        </div>
        <!--Subsección 3 | Resultados de la ONG-->
        <div class="w-full flex flex-col items-center">
            <h2 class="merriweather-bold font-bold text-customGreen text-5xl mb-12">Nuestros Resultados en 2023</h2>
            <div class="w-full flex flex-wrap justify-center gap-6">
                <!-- Card 1 -->
                <div class="w-64 bg-customLighterGray text-customBeige p-6 rounded-lg shadow-lg text-center">
                    <p class="text-4xl font-bold">97</p>
                    <p class="mt-2 text-lg">Programas</p>
                </div>
                <!-- Card 2 -->
                <div class="w-64 bg-customLighterGray text-customBeige p-6 rounded-lg shadow-lg text-center">
                    <p class="text-4xl font-bold">$4,856,190</p>
                    <p class="mt-2 text-lg">Invertidos en programas</p>
                </div>
                <!-- Card 3 -->
                <div class="w-64 bg-customLighterGray text-customBeige p-6 rounded-lg shadow-lg text-center">
                    <p class="text-4xl font-bold">72,993</p>
                    <p class="mt-2 text-lg">Beneficiarios</p>
                </div>
            </div>
        </div>
    </div>

    <!--Sección ¿cómo puedes ayudar?-->
    <div class="bg-customDarkGray pb-32 px-48">
        <h2 class="merriweather-bold text-6xl font-bold text-center text-customGreen mb-8">¿Cómo puedes ayudar?</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Tarjeta 1: Comparte nuestra misión -->
            <div onmouseenter="showTooltip(event)" onmousemove="moveTooltip(event)" onmouseleave="hideTooltip()" onclick="copyLink()" class="relative cursor-pointer text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                <div class="mb-4">
                    <img src="{{ asset('img/share-img-index.png') }}" alt="Comparte nuestra misión" class="mx-auto h-16 w-16 hover-bounce-img">
                </div>
                <h3 class="text-lg font-semibold text-customBeige mb-2">Comparte nuestra misión</h3>
                <p class="text-customBeige text-sm text-center text-justify">
                    Ayúdanos a llegar a más personas compartiendo nuestra causa. Cuantas más personas conozcan nuestro trabajo, más impacto podemos tener.
                </p>
                <div class="mt-[1rem] flex items-center">
                    <p class="merriweather-bold text-lg font-bold text-customGreen">¡Compartir ahora!</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#1ab76a" class="w-5 h-5 ml-[0.25rem] transition-all duration-300 group-hover:ml-[0.6rem]">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                    </svg>
                </div>
            </div>

            <!-- Tooltip -->
            <span id="tooltip" class="hidden absolute px-2 py-1 bg-black bg-opacity-75 text-white rounded-md text-xs shadow-lg transition-opacity duration-300">Copiar enlace</span>

            <!-- Tarjeta 2: Donación general -->
            <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                <div class="mb-4">
                    <img src="{{ asset('img/donate-img-index.png') }}" alt="Donación general" class="mx-auto h-16 w-16 hover-bounce-img">
                </div>
                <h3 class="text-lg font-semibold text-customBeige mb-2">Donación general</h3>
                <p class="text-customBeige text-sm text-center text-justify">
                    Gracias a tu apoyo, podemos seguir impulsando proyectos educativos, de desarrollo y ayuda a quienes más lo necesitan.
                </p>
                <div class="mt-[1rem] flex items-center">
                    <p class="merriweather-bold text-lg font-bold text-customGreen">¡Donar ahora!</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#1ab76a" class="w-5 h-5 ml-[0.25rem] transition-all duration-300 group-hover:ml-[0.6rem]">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                    </svg>
                </div>
            </div>

            <!-- Tarjeta 3: Vuélvete un voluntario -->
            <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                <div class="mb-4">
                    <img src="{{ asset('img/volunteers-img-index.png') }}" alt="Vuélvete un voluntario" class="mx-auto h-16 w-16 hover-bounce-img">
                </div>
                <h3 class="text-lg font-semibold text-customBeige mb-2">Vuélvete un voluntario</h3>
                <p class="text-customBeige text-sm text-center">
                    Sé parte del cambio. Únete como voluntario y contribuye activamente a nuestros programas e iniciativas.
                </p>
                <div class="mt-[1rem] flex items-center">
                    <p class="merriweather-bold text-lg font-bold text-customGreen">¡Soliciar ser voluntario!</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#1ab76a" class="w-5 h-5 ml-[0.25rem] transition-all duration-300 group-hover:ml-[0.6rem]">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                    </svg>
                </div>
            </div>

            <!-- Tarjeta 4: Forma parte de nuestros programas -->
            <a href="{{ url('/programs') }}" class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                <div class="mb-4">
                    <img src="{{ asset('img/programs-img-index.png') }}" alt="Forma parte de las actividades" class="mx-auto h-16 w-16 hover-bounce-img">
                </div>
                <h3 class="text-lg font-semibold text-customBeige mb-2">Forma parte de nuestros programas</h3>
                <p class="text-customBeige text-sm text-center">
                    Participa en nuestros programas para sensibilizar sobre la educación y la desigualdad. Tu apoyo inspira a otros y fortalece el cambio social.
                </p>
                <div class="mt-[1rem] flex items-center">
                    <p class="merriweather-bold text-lg font-bold text-customGreen">¡Ver programas!</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#1ab76a" class="w-5 h-5 ml-[0.25rem] transition-all duration-300 group-hover:ml-[0.6rem]">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    <x-footer />
</body>
</html>
    
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


<script>
    function copyLink() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            console.log('Enlace copiado al portapapeles');
            hideTooltip(); // Oculta el tooltip después de copiar
        }).catch(err => {
            console.error('Error al copiar el enlace:', err);
        });
    }

    function showTooltip(event) {
        const tooltip = document.getElementById("tooltip");
        tooltip.classList.remove("hidden");
        moveTooltip(event); // Asegura que el tooltip esté en la posición correcta desde el inicio
    }

    function moveTooltip(event) {
        const tooltip = document.getElementById("tooltip");
        tooltip.style.left = event.pageX + 15 + "px"; // Ajusta la posición horizontal del tooltip
        tooltip.style.top = event.pageY + 15 + "px"; // Ajusta la posición vertical del tooltip
    }

    function hideTooltip() {
        const tooltip = document.getElementById("tooltip");
        tooltip.classList.add("hidden");
    }
</script>