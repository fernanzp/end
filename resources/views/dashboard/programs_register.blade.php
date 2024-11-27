<x-head />
<body class=" bg-customDarkGray font-sans antialiased">
    <style>
        <x-styles />

        /* Oculta el texto del sidebar cuando está comprimido */
        #sidebar.compressed .sidebar-text {
            display: none;
        }

        /* Ajusta la visibilidad del tooltip */
        #sidebar .tooltip-text {
            visibility: hidden;
            opacity: 0;
            transition: visibility 0.2s, opacity 0.2s ease-in-out;
        }

        /* Muestra el tooltip cuando se hace hover */
        #sidebar.compressed .my-2:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
    

    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-8 transition-all duration-300">

        <x-navbar_configuration />
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-4 mt-7">
            <h1 class="merriweather-bold text-3xl text-customGreen font-bold mb-4">Programas</h1>
            <button class="flex items-center justify-center px-4 py-2 bg-transparent text-customGreen border-customGreen border-4 rounded-lg transition-all duration-300 hover:bg-customGreen hover:text-customDarkGray modal-link" data-modal-target="create_a_program-modal">
                Crear un nuevo programa <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="w-4 h-4 ml-2"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
            </button>
        </div>

        
        <!-- Filters -->
        <div class="flex gap-4 mb-6">
            <form method="GET" action="{{ url('/configuration/programs') }}" class="w-full flex gap-2">
                <!-- Barra de búsqueda -->
                <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}" class="p-3 border bg-customLighterGray border-none text-customBeige rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 flex-1" onchange="this.form.submit()">
        
                <!-- Categoría -->
                <select name="category" class="p-3 border bg-customLighterGray border-none text-customBeige rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" onchange="this.form.submit()">
                    <option value="" {{ request('category') ? '' : 'selected' }}>Todos</option>
                    <option value="educativo" {{ request('category') == 'educativo' ? 'selected' : '' }}>Educativo</option>
                    <option value="económico" {{ request('category') == 'económico' ? 'selected' : '' }}>Económico</option>
                    <option value="caritativo" {{ request('category') == 'caritativo' ? 'selected' : '' }}>Caritativo</option>
                    <option value="inclusivo" {{ request('category') == 'inclusivo' ? 'selected' : '' }}>Inclusivo</option>
                    <option value="capacitación" {{ request('category') == 'capacitación' ? 'selected' : '' }}>Capacitación</option>
                    <option value="otro" {{ request('category') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </form>
        </div>

        <!-- Program List -->
        <div class="space-y-6 my-5">
            <!-- Grid for cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($programs as $program)
                    <x-program-card :program="$program" />
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6 flex justify-center">
                <div class="mt-6 flex justify-center">
                    {{ $programs->links() }}
                </div>
            </div>
        </div>
    </section>
    
    <!-- MODAL DEL "CREAR PROGRAMA" -->
    <div id="create_a_program-modal" class="modal fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden">
        <div class="bg-customDarkGray w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative h-4/5 overflow-y-auto">
            <h2 class="merriweather-bold text-2xl text-center text-customGreen font-bold mb-4">Crea un nuevo programa</h2>

            <form id="program-form" method="POST" action="{{ route('programs.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Título, requerido -->
                <div class="mb-4">
                    <label for="title" class="block text-customGreen font-bold text-xl mb-1">Título:</label>
                    <input type="text" placeholder="Título del programa" name="title" id="title" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
                </div>

                <!-- Lista desplegable para la categoría -->
                <div class="mb-4">
                    <label for="category" class="block text-customGreen font-bold text-xl mb-1">Categoría:</label>
                    <select name="category" id="category" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        <option value="educativo">Educativo</option>
                        <option value="economico">Económico</option>
                        <option value="caritativo">Caritativo</option>
                        <option value="inclusivo">Inclusivo</option>
                        <option value="capacitacion">Capacitación</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                    <!-- Descripción corta del programa, requerido -->
                    <div class="mb-4">
                        <label for="short_description" class="block text-customGreen font-bold text-xl mb-1">Descripción corta:</label>
                        <input type="text" placeholder="Ingresa una descripción corta" name="short_description" id="short_description" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
                    </div>

                    <!-- Campo de texto para la descripción completa del programa, requerido -->
                    <div class="mb-4">
                        <label for="description" class="block text-customGreen font-bold text-xl mb-1">Descripción completa:</label>
                        <textarea placeholder="Descripción completa del programa" name="description" id="description" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required></textarea>
                    </div>

                <!-- Duración del evento (radio buttons) -->
                <label for="description" class="block text-customGreen font-bold text-xl mb-1">Duración del Evento:</label>
                <div class="mb-4">
                    <input type="radio" id="single_day" name="event_duration" value="single_day" onchange="toggleDateFields()" checked>
                    <label for="single_day" class="mr-4 text-base text-customBeige font-bold">Un solo día</label>
                    
                    <input type="radio" id="multiple_days" name="event_duration" value="multiple_days" onchange="toggleDateFields()">
                    <label for="multiple_days" class="text-base text-customBeige font-bold">Varios días</label>
                </div>

                <!-- Campo de fecha para un evento de un solo día -->
                <div id="single_date_field" class="mb-4">
                    <label for="date" class="block text-customGreen font-bold text-xl mb-1">Fecha:</label>
                    <input type="date" name="date" id="date" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
                </div>

                <!-- Campos de fecha de inicio y fin para eventos de varios días -->
                <div id="multiple_dates_fields" class="mb-4 hidden"> <!--hidden-->
                    <!-- Campo de fecha de inicio -->
                    <label for="start_date" class="block text-customGreen font-bold text-xl mb-1">Fecha de inicio:</label>
                    <input type="date" name="start_date" id="start_date" class="mb-3 w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" onchange="updateEndDateMin()" required>

                    <!-- Campo de fecha de finalización -->
                    <label for="end_date" class="block text-customGreen font-bold text-xl mb-1">Fecha de finalización:</label>
                    <input type="date" name="end_date" id="end_date" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none">
                </div>

                <!-- Selección de modalidad: presencial o en línea, requerido -->
                <div class="mb-4">
                    <label for="modality" class="block text-customGreen font-bold text-xl mb-1">Modalidad:</label>
                    <select name="modality" id="modality" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4" required>
                        <option value="presencial">Presencial</option>
                        <option value="en línea">Virtual</option>
                    </select>
                </div>

                <!-- Campo de texto para la ubicación (solo si es presencial) -->  
                <div id="place_container" class="mb-4">
                    <label for="place" class="block text-customGreen font-bold text-xl mb-1">Ubicación:</label>
                    <input type="text" placeholder="Ingresa la ubicación en donde se llevará acabo el programa" name="place" id="place" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none">
                </div>

                <!-- Campo de latitud -->
                <input type="hidden" id="latitude" name="latitude">

                <!-- Campo de longitud -->
                <input type="hidden" id="longitude" name="longitude">

                <!-- Campo de texto para el link de la reunión (solo si es en línea) -->
                <div id="meeting_link_container" class="mb-4 hidden">
                    <label for="meeting_link" class="block text-customGreen font-bold text-xl mb-1">Link de la reunión:</label>
                    <input type="url" placeholder="Genera un link de reunión e ingresalo" name="meeting_link" id="meeting_link" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none">
                </div>

                <!-- Días de la semana, solo visibles para eventos de varios días -->
                <div id="week_days_field" class="mb-4"> <!--hidden-->
                    <label for="days_of_the_week" class="block text-customGreen font-bold text-xl">Días de la Semana:</label>
                    <p class="mb-1 text-gray-400">Selecciona los días de la semana en que se llevará a cabo el programa</p>
                    <div class="grid grid-cols-3">
                        @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $day)
                        <div>
                            <input type="checkbox" name="days_of_the_week[]" value="{{ $day }}" id="day-{{ $day }}" class="mr-2">
                            <label for="day-{{ $day }}" class="mr-4 text-customBeige">{{ $day }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!--HORARIO-->
                <!-- Campo de horario dividido en inicio y fin -->
                <div class="mb-4 flex justify-between space-x-4">
                    <!-- Campo de hora de inicio -->
                    <div class="flex-1">
                        <label for="start_time" class="block text-customGreen font-bold text-xl text-center">Hora de inicio</label>
                        <input type="time" name="start_time" id="start_time" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required onchange="validateTime()">
                    </div>

                    <!-- Campo de hora de fin -->
                    <div class="flex-1">
                        <label for="end_time" class="block text-customGreen font-bold text-xl text-center">Hora de fin</label>
                        <input type="time" name="end_time" id="end_time" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required onchange="validateTime()">
                    </div>
                </div>

                <!-- Campo de rango de edad dividido en mínimo y máximo -->
                <label class="block text-customGreen font-bold text-xl">Rango de Edad:</label>
                <div class="mb-4 space-y-4">

                    <!-- Campo de Edad Mínima -->
                    <div>
                        <label for="min_age" class="block text-customBeige text-base mb-1 text-center">Edad mínima: <span id="min_age_value">4</span></label>
                        <input type="range" name="min_age" id="min_age" class="w-full" min="4" max="99" value="4" oninput="updateAgeRange()" required>
                    </div>

                    <!-- Campo de Edad Máxima -->
                    <div>
                        <label for="max_age" class="block text-customBeige text-base mb-1 text-center">Edad máxima: <span id="max_age_value">99</span></label>
                        <input type="range" name="max_age" id="max_age" class="w-full" min="4" max="99" value="99" oninput="updateAgeRange()" required>
                    </div>
                </div>

                <!-- Campo numérico para la capacidad de beneficiarios, requerido -->
                <div class="mb-4">
                    <label for="beneficiary_capacity" class="block text-customGreen font-bold text-xl mb-1">Capacidad máxima de beneficiarios:</label>
                    <input type="number" min="1" max="5000" placeholder="Capacidad máxima de beneficiarios para el programa" name="beneficiary_capacity" id="beneficiary_capacity" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
                </div>

                <!-- Campo numérico para la capacidad de voluntarios, requerido -->
                <div class="mb-4">
                    <label for="volunteer_capacity" class="block text-customGreen font-bold text-xl mb-1">Capacidad máxima de voluntarios:</label>
                    <input type="number" min="0" max="5000" placeholder="Capacidad máxima de voluntarios para el programa" name="volunteer_capacity" id="volunteer_capacity" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
                </div>

                <!-- Campo de texto para el objetivo del programa, requerido -->
                <div class="mb-4">
                    <label for="objetive" class="block text-customGreen font-bold text-xl mb-1">Objetivo:</label>
                    <textarea placeholder="Objetivo del programa" name="objetive" id="objetive" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required></textarea>
                </div>

                <!--Contenidos-->
                <div id="input-container">
                    <label class="block text-customGreen font-bold text-xl mb-1">Contenidos:</label>
                    <div class="input-group flex items-center mb-4">
                        <input type="text" name="contents[]" placeholder="Actividades o tareas a realizar en el programa (opcional)" id="contents" class="w-[90%] bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none">
                        <button type="button" class="remove-button ml-4 bg-red-500 text-white w-[7%] p-2 rounded-md hover:bg-red-600 hidden">-</button>
                        <button type="button" id="add-input" class="add-button ml-4 bg-customGreen text-white w-[7%] p-2 rounded-md hover:bg-customDarkGreen">+</button>
                    </div>
                </div>

                <!-- Campo de texto para la información de financiamiento (opcional) -->
                <div class="mb-4">
                    <label for="financing" class="block text-customGreen font-bold text-xl mb-1">Financiamiento:</label>
                    <textarea placeholder="Financiamiento del programa (opcional)" name="financing" id="financing" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none"></textarea>
                </div>

                <!-- Campo de archivo para cargar la imagen del programa, requerido -->
                <label for="img" class="block text-customGreen font-bold text-xl mb-1">Imágen del programa:</label>
                <input type="file" name="img" id="img" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>

                <!-- Botónes de Cancelar y Crear -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <button type="button" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-transparent text-customGreen font-bold py-2 px-4 rounded border-customGreen border-4 hover:text-customLighterGray hover:bg-customGreen transition-colors duration-300 ease-in-out">
                        Crear
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DEL "Solicitar PROGRAMA" -->
    <div id="request_a_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Solicita un programa</h2>
            <p class="text-gray-700 mb-4">Inserta inputs necesarios para el programa</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal de botón para editar el programa -->
    <div id="program_info-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Editar</h2>
            <p class="text-gray-700 mb-4">Aquí va la información del programa en cuestión</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal para borrar un programa -->
    <div id="delete_program-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">¿Deseas eliminar este programa?</h2>
            <p class="text-gray-700 mb-4">Aquí van las 2 opciones</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <script>
    // Selección de elementos
    const menuBar = document.getElementById('menuBar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const notificationBell = document.getElementById('notificationBell');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const sidebarTextElements = document.querySelectorAll('.sidebar-text');

    // Mostrar/Ocultar el dropdown de notificaciones
    notificationBell.addEventListener('click', function (event) {
        event.preventDefault();
        notificationDropdown.classList.toggle('hidden');
    });

    // Ocultar el dropdown si se hace clic fuera de él
    window.addEventListener('click', function (e) {
        if (!notificationBell.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.add('hidden');
        }
    });

    menuBar.addEventListener('click', function () {
        // Alternar clase comprimido en el sidebar
        sidebar.classList.toggle('compressed');

        // Cambiar el ancho del sidebar y ajustar el margen del contenido
        sidebar.classList.toggle('w-16');
        sidebar.classList.toggle('w-64');
        content.classList.toggle('ml-16');
        content.classList.toggle('ml-64');
    });

    
	</script>

    <script>
        // Seleccionar todos los enlaces de apertura de modal y los botones de cierre de modal
        const modalLinks = document.querySelectorAll('.modal-link');
        const modals = document.querySelectorAll('.modal');
        const closeModalButtons = document.querySelectorAll('.close-modal');

        // Abrir el modal correspondiente al enlace clicado
        modalLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetModalId = link.getAttribute('data-modal-target');
                const targetModal = document.getElementById(targetModalId);
                if (targetModal) {
                    targetModal.classList.remove('hidden');
                }
            });
        });

        // Cerrar modal al hacer clic en el botón de cierre
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                button.closest('.modal').classList.add('hidden');
            });
        });

        // Cerrar modal al hacer clic fuera del contenido del modal
        window.addEventListener('click', function(event) {
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>

    <!--TODA LA LOGICA DE JAVASCRIPT PARA EL MODAL DE CREAR UN NUEVO PROGRAMA-->
    <script>
        // Función para actualizar la fecha mínima en el campo de fecha final
        function updateEndDateMin() {
            const startDate = document.getElementById('start_date').value;
            const endDateInput = document.getElementById('end_date');
            if (startDate) {
                endDateInput.setAttribute('min', startDate);
            }
        }
    </script>
    <script>
        // Función para mostrar/ocultar campos basados en la modalidad seleccionada
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('modality').addEventListener('change', function () {
                const modality = this.value;
                const placeContainer = document.getElementById('place_container');
                const meetingLinkContainer = document.getElementById('meeting_link_container');
                const placeField = document.getElementById('place');
                const meetingLinkField = document.getElementById('meeting_link');
                
                if (modality === 'presencial') {
                    placeContainer.classList.remove('hidden');
                    meetingLinkContainer.classList.add('hidden');
                    meetingLinkField.value = ''; // Limpia el campo si estaba visible anteriormente
                } else if (modality === 'virtual') {
                    meetingLinkContainer.classList.remove('hidden');
                    placeContainer.classList.add('hidden');
                    placeField.value = ''; // Limpia el campo si estaba visible anteriormente
                }
            });
        });
    </script>

    <script>
        //Funcion para validar la hora en el horario
        function validateTime() {
            const startTimeInput = document.getElementById('start_time');
            const endTimeInput = document.getElementById('end_time');
            const startTime = startTimeInput.value;
            const endTime = endTimeInput.value;
        
            // Si ambos campos tienen valor, procede con la validación
            if (startTime && endTime) {
                if (endTime <= startTime) {
                    endTimeInput.setCustomValidity('La hora de fin debe ser posterior a la hora de inicio.');
                } else {
                    endTimeInput.setCustomValidity(''); // Limpia el mensaje de error si la validación es exitosa
                }
            }
        }
        
        // Evita que se envíe el formulario si hay un error de validación en los tiempos
        document.getElementById('create_a_program-modal').addEventListener('submit', function(event) {
            const endTimeInput = document.getElementById('end_time');
            if (!endTimeInput.checkValidity()) {
                event.preventDefault(); // Evita el envío del formulario si la validación falla
            }
        });
        
    </script>

    <script>
        // Función para actualizar el rango de edad
        function updateAgeRange() {
            const minAgeInput = document.getElementById('min_age');
            const maxAgeInput = document.getElementById('max_age');
            const minAgeValue = document.getElementById('min_age_value');
            const maxAgeValue = document.getElementById('max_age_value');
        
            // Ajusta el valor mínimo y máximo permitidos
            maxAgeInput.min = minAgeInput.value;
            minAgeInput.max = maxAgeInput.value;
        
            // Actualiza los valores mostrados en las etiquetas
            minAgeValue.textContent = minAgeInput.value;
            maxAgeValue.textContent = maxAgeInput.value;
        
            // Valida que la edad máxima sea mayor o igual a la edad mínima
            if (parseInt(maxAgeInput.value) < parseInt(minAgeInput.value)) {
                maxAgeInput.setCustomValidity('La edad máxima debe ser mayor o igual a la edad mínima.');
            } else {
                maxAgeInput.setCustomValidity(''); // Limpia el mensaje de error si la validación es exitosa
            }
        }
        
        // Evita que se envíe el formulario si hay un error de validación en el rango de edad
        document.getElementById('create_a_program-modal').addEventListener('submit', function(event) {
            const maxAgeInput = document.getElementById('max_age');
            if (!maxAgeInput.checkValidity()) {
                event.preventDefault(); // Evita el envío del formulario si la validación falla
            }
        });
    </script>

    <script>
        document.getElementById('program-form').addEventListener('submit', function(event) {
            const eventDuration = document.querySelector('input[name="event_duration"]:checked').value;
            let startDate = document.getElementById('start_date').value;
            let endDate = document.getElementById('end_date').value;
            let date = document.getElementById('date').value;

            // Validación para evento de varios días
            if (eventDuration === 'multiple_days') {
                if (!startDate || !endDate) {
                    alert('Por favor, complete ambos campos de fecha de inicio y finalización.');
                    event.preventDefault(); // Evita el envío del formulario
                    return;
                }

                // Verificar que la fecha de finalización no sea anterior a la fecha de inicio
                if (new Date(endDate) <= new Date(startDate)) {
                    alert('La fecha de finalización no puede ser anterior o igual a la fecha de inicio.');
                    event.preventDefault(); // Evita el envío del formulario
                }
            } 
            // Validación para evento de un solo día
            else if (eventDuration === 'single_day') {
                if (!date) {
                    alert('Por favor, seleccione una fecha para el evento.');
                    event.preventDefault(); // Evita el envío del formulario
                    return;
                }
            }
        });

        function toggleDateFields() {
            const singleDayField = document.getElementById('single_date_field');
            const multipleDatesFields = document.getElementById('multiple_dates_fields');
            const startDateField = document.getElementById('start_date');
            const endDateField = document.getElementById('end_date');
            const singleDayRadio = document.getElementById('single_day');
            const multipleDaysRadio = document.getElementById('multiple_days');
            const weekDaysField = document.getElementById('week_days_field');
            const dateField = document.getElementById('date');
            
            // Si el evento es de un solo día
            if (singleDayRadio.checked) {
                // Mostrar solo el campo de un solo día
                singleDayField.style.display = 'block';
                multipleDatesFields.style.display = 'none';
                weekDaysField.style.display = 'none'; // Ocultar días de la semana

                // Deshabilitar los campos de fecha de inicio y fin
                startDateField.disabled = true;
                endDateField.disabled = true;

                // Deshabilitar y limpiar el campo de 'date'
                dateField.disabled = false; // Asegurarse de que 'date' está habilitado para un solo día
                dateField.value = ''; // Limpiar su valor

                // Limpiar los valores de start_date y end_date para que no se envíen
                startDateField.value = '';
                endDateField.value = '';
            } else {
                // Si el evento es de varios días
                singleDayField.style.display = 'none';
                multipleDatesFields.style.display = 'block';
                weekDaysField.style.display = 'block'; // Mostrar días de la semana

                // Habilitar los campos de fecha de inicio y fin
                startDateField.disabled = false;
                endDateField.disabled = false;

                // Deshabilitar 'date' si el evento es de varios días
                dateField.disabled = true;
                dateField.value = ''; // Limpiar su valor
            }
        }

        // Llamamos la función al cargar la página para configurar el estado inicial
        document.addEventListener('DOMContentLoaded', toggleDateFields);

        // Llamamos la función cuando el radio button cambia para actualizar los campos
        document.getElementById('single_day').addEventListener('change', toggleDateFields);
        document.getElementById('multiple_days').addEventListener('change', toggleDateFields);
    </script>

    <script>
        //Funcion para dar una alerta cuando la edad minima sea mayor que la maxima
        function showTemporaryMessage(message) {
            const tempMessage = document.createElement('div');
            tempMessage.textContent = message;
            tempMessage.style.color = 'red';
            tempMessage.style.fontSize = '0.9em';
            document.getElementById('max_age').parentNode.appendChild(tempMessage);
            setTimeout(() => tempMessage.remove(), 3000); // Elimina el mensaje después de 3 segundos
        }
        
        if (parseInt(maxAgeInput.value) < parseInt(minAgeInput.value)) {
            maxAgeInput.setCustomValidity('La edad máxima debe ser mayor o igual a la edad mínima.');
            showTemporaryMessage('La edad máxima debe ser mayor o igual a la edad mínima.');
        } else {
            maxAgeInput.setCustomValidity('');
        }
    </script>

    <script>
        const inputContainer = document.getElementById('input-container');

        // Función para agregar un nuevo campo
        const addInput = () => {
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group flex items-center mb-4';
            newInputGroup.innerHTML = `
                <input type="text" name="contents[]" placeholder="Actividades o tareas a realizar en el programa (opcional)" class="w-[90%] bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none">
                <button type="button" class="remove-button ml-4 bg-red-500 text-white w-[7%] p-2 rounded-md hover:bg-red-600 hidden">-</button>
            `;
            newInputGroup.querySelector('.remove-button').addEventListener('click', removeInput);
            inputContainer.appendChild(newInputGroup);
            updateRemoveButtons();
        };

        // Función para eliminar un campo
        const removeInput = (e) => {
            e.target.closest('.input-group').remove();
            updateRemoveButtons();
        };

        // Función para actualizar los botones "Eliminar"
        const updateRemoveButtons = () => {
            const inputGroups = document.querySelectorAll('.input-group');
            inputGroups.forEach((group, index) => {
                const removeButton = group.querySelector('.remove-button');
                if (removeButton) {
                    removeButton.classList.toggle('hidden', index === 0); // Oculta el botón en el primer grupo
                }
            });
        };

        // Inicializar eventos en el botón de agregar
        document.getElementById('add-input').addEventListener('click', addInput);

        // Asegurarse de que el botón "Eliminar" esté oculto al inicio
        updateRemoveButtons();
    </script>
</body>
</html>
