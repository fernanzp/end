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

    <!--Sección ¿Quiénes somos?-->
    <div class="bg-customDarkGray px-40 py-32 flex flex-col items-center justify-center">
        <!--Subsección 1 | ¿Quiénes somos?-->
        <div class="w-full flex justify-between items-center pb-32 scroll-animation">
            <div class="w-[50%] flex items-center">
                <div class="w-full">
                    <p class="merriweather-bold font-bold text-customGreen text-6xl mb-12">Más sobre nosotros</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">¿Cómo tu donación puede cambiar vidas?</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">En Education Non Disparity, trabajamos para garantizar que todas las personas, sin importar su origen o situación, tengan acceso a una educación de calidad. A través de nuestros programas y proyectos, reducimos las desigualdades educativas y brindamos oportunidades a quienes más lo necesitan. Tu donación es una herramienta poderosa para crear un futuro más justo, ya que contribuye directamente a la implementación de recursos educativos y programas de formación que transforman vidas..</p>
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Haz una donación y marca la diferencia</p>
                    <p class="text-customBeige text-xl text-justify">Tu apoyo es fundamental para continuar nuestra misión. Con cada donación, proporcionamos acceso a materiales educativos, becas y programas de capacitación a personas en situación de vulnerabilidad. Cada aporte, grande o pequeño, tiene un impacto directo y real en la vida de aquellos que necesitan oportunidades para cambiar su futuro. Al donar, no solo estás contribuyendo a una causa justa, sino que te conviertes en un agente de cambio para la próxima generación.</p>
                </div>
            </div>
            <div class="w-[40%] flex justify-center">
                <img src="{{ asset('img/donaciones4-donations.jpg') }}" alt="Imagen representativa" class="w-full h-auto rounded-3xl">
            </div>
        </div>
        <!--Subsección 2 | Nuestros valores-->
        <div class="w-full flex flex-col scroll-animation">
            <p class="merriweather-bold font-bold text-customGreen text-5xl mb-12">Formas de donar: Haz la diferencia de diversas maneras</p>
            <div class="w-full flex justify-between">
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Donación voluntaria</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">Las donaciones voluntarias nos permiten proporcionar becas, materiales educativos, y recursos para el desarrollo de nuevos programas y actividades. Con una contribución regular o puntual, puedes ayudar a financiar la educación inclusiva y equitativa para todos..</p>
                </div>
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Voluntariado</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">Otra forma invaluable de contribuir es a través del voluntariado. Al dedicar tu tiempo y habilidades a nuestros programas, no solo estás brindando apoyo directo, sino también compartiendo tu conocimiento y experiencia con aquellos que más lo necesitan.</p>
                </div>
                <div class="w-[30%] flex flex-col">
                    <p class="merriweather-bold font-bold text-customBeige text-3xl mb-4">Impacto de tu donación</p>
                    <p class="text-customBeige text-xl mb-12 text-justify">Si tienes experiencia en áreas como la educación, la tecnología, o el diseño de programas, tu apoyo también puede ser invaluable a través de la creación de nuevos proyectos o la mejora de los existentes. Con tu creatividad y conocimiento, podemos innovar la forma en que llegamos a las comunidades más necesitadas.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección 3 -->
    <div class="bg-customDarkGray pb-24">
        <div class="container mx-auto px-4">
            <h2 class="merriweather-bold font-bold text-customGreen text-5xl mb-12 text-center scroll-animation">¿Qué donamos?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Tarjeta 1: Comparte nuestra misión -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 scroll-animation">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones5-donations.png') }}" alt="Comparte nuestra misión" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Material escolar</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Dona cuadernos, lápices, mochilas y otros útiles escolares para apoyar la educación de niños y jóvenes en comunidades vulnerables, facilitando su acceso a un aprendizaje de calidad.
                    </p>
                </div>

                <!-- Tarjeta 2: Donación general -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 scroll-animation">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones6-donations.png') }}" alt="Donación general" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Acceso a la tecnología</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Contribuye con dispositivos electrónicos como computadoras, tablets o smartphones, permitiendo a estudiantes de bajo recursos acceder a herramientas tecnológicas para su formación y reducir la brecha digital.
                    </p>
                </div>

                <!-- Tarjeta 3: Vuélvete un voluntario -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 scroll-animation">
                    <div class="mb-4">
                        <img src="{{ asset('img/donaciones7-donations.png') }}" alt="Vuélvete un voluntario" class="mx-auto h-16 w-16">
                    </div>
                    <h3 class="text-lg font-semibold text-customBeige mb-2">Becas educativas</h3>
                    <p class="text-customBeige text-sm text-justify">
                        Ayuda a financiar la educación de los estudiantes en situación de vulnerabilidad. Las becas permiten a los jóvenes continuar su formación académica y alcanzar nuevas oportunidades que de otro modo no estarían a su alcance.
                    </p>
                </div>

                <!-- Tarjeta 4: Forma parte de las actividades -->
                <div class="text-center p-6 bg-customLighterGray shadow-md rounded-lg transform transition duration-300 hover:shadow-xl hover:scale-105 scroll-animation">
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
        document.addEventListener("DOMContentLoaded", function() {
            const scrollElements = document.querySelectorAll(".scroll-animation");

            const elementInView = (el, dividend = 1) => {
                const elementTop = el.getBoundingClientRect().top;
                return (
                    elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
                );
            };

            const displayScrollElement = (element) => {
                element.classList.add("visible");
            };

            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 1.25) && !el.classList.contains("visible")) {
                        displayScrollElement(el);
                    }
                });
            };

            window.addEventListener("scroll", () => {
                handleScrollAnimation();
            });
        });
    </script>

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