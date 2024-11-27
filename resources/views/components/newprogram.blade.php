<!-- Modal para crear un nuevo programa -->
<div id="modal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-60 hidden">
    
    <!-- Formulario para crear un nuevo programa, con envío de datos mediante POST y soporte para archivos adjuntos -->
    <form id="program-form" action="{{ route('configuration.programs.create') }}" method="POST" enctype="multipart/form-data" class="h-3/4 bg-white p-8 rounded-xl shadow-lg w-1/4 overflow-y-auto">
        
        <!-- Token CSRF para proteger el formulario contra ataques Cross-Site Request Forgery -->
        @csrf
        
        <!-- Título del formulario -->
        <h2 class="text-2xl font-bold mb-4 text-center">Nuevo programa</h2>
       
        <!-- Campo de texto para el título del programa, requerido -->
        <input type="text" placeholder="Título" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Lista desplegable para la categoría -->
        <select name="category" id="category" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
            <option value="" disabled selected>Selecciona una categoría</option>
            <option value="educativo">Educativo</option>
            <option value="economico">Económico</option>
            <option value="caritativo">Caritativo</option>
            <option value="inclusivo">Inclusivo</option>
            <option value="capacitacion">Capacitación</option>
            <option value="otro">Otro</option>
        </select>

        <!-- Campo de texto para una descripción corta del programa, requerido -->
        <input type="text" placeholder="Descripción corta" name="short_description" id="short_description" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Campo de texto para la descripción completa del programa, requerido -->
        <textarea placeholder="Descripción" name="description" id="description" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required></textarea>
        

        <!-- Duración del evento (radio buttons) -->
        <label class="block text-lg font-medium mb-2">Duración del Evento:</label>
        <div class="mb-4">
            <input type="radio" id="single_day" name="event_duration" value="single_day" onchange="toggleDateFields()" checked>
            <label for="single_day" class="mr-4">Un solo día</label>
            
            <input type="radio" id="multiple_days" name="event_duration" value="multiple_days" onchange="toggleDateFields()">
            <label for="multiple_days">Varios días</label>
        </div>

        <!-- Campo de fecha para un evento de un solo día -->
        <div id="single_date_field" class="mb-4">
            <label for="date" class="block text-lg font-medium mb-2">Fecha:</label>
            <input type="date" name="date" id="date" class="w-full p-3 border border-gray-300 rounded-xl" required>
        </div>

        <!-- Campos de fecha de inicio y fin para eventos de varios días -->
        <div id="multiple_dates_fields" class="mb-4 hidden">
            <!-- Campo de fecha de inicio -->
            <label for="start_date" class="block text-lg font-medium mb-2">Fecha de inicio:</label>
            <input type="date" name="start_date" id="start_date" class="w-full p-3 border border-gray-300 rounded-xl mb-4" onchange="updateEndDateMin()" required>

            <!-- Campo de fecha de finalización -->
            <label for="end_date" class="block text-lg font-medium mb-2">Fecha de finalización:</label>
            <input type="date" name="end_date" id="end_date" class="w-full p-3 border border-gray-300 rounded-xl">
        </div>


        <!-- Selección de modalidad: presencial o en línea, requerido -->
        <label for="modality">Elige la modalidad:</label>
        <select name="modality" id="modality" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
            <option value="presencial">Presencial</option>
            <option value="virtual">Virtual</option>
        </select>

        <!-- Campo de texto para la ubicación (solo si es presencial) -->
        <input type="text" placeholder="Ubicación" name="place" id="place" class="w-full p-3 border border-gray-300 rounded-xl mb-4">

        <!-- Campo de latitud -->
        <input type="hidden" id="latitude" name="latitude">

        <!-- Campo de longitud -->
        <input type="hidden" id="longitude" name="longitude">


        <!-- Campo de texto para el link de la reunión (solo si es en línea) -->
        <input type="url" placeholder="Link de la reunión" name="meeting_link" id="meeting_link" class="w-full p-3 border border-gray-300 rounded-xl mb-4 hidden">

        
       <!-- Días de la semana, solo visibles para eventos de varios días -->
        <div id="week_days_field" class="mb-4 hidden">
            <label for="days_of_the_week">Días de la Semana:</label>
            <div>
                @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $day)
                    <input type="checkbox" name="days_of_the_week[]" value="{{ $day }}" id="day-{{ $day }}" class="mr-2">
                    <label for="day-{{ $day }}" class="mr-4">{{ $day }}</label>
                @endforeach
            </div>
        </div>
        

        <!--HORARIO-->
        <!-- Campo de horario dividido en inicio y fin -->
        <label class="block text-lg font-medium mb-2">Horario:</label>
        <div class="mb-4 flex justify-between space-x-4">
            <!-- Campo de hora de inicio -->
            <div class="flex-1">
                <label for="start_time" class="block text-sm font-medium mb-1">Hora de inicio</label>
                <input type="time" name="start_time" id="start_time" class="w-full p-3 border border-gray-300 rounded-xl" required onchange="validateTime()">
            </div>

            <!-- Campo de hora de fin -->
            <div class="flex-1">
                <label for="end_time" class="block text-sm font-medium mb-1">Hora de fin</label>
                <input type="time" name="end_time" id="end_time" class="w-full p-3 border border-gray-300 rounded-xl" required onchange="validateTime()">
            </div>
        </div>


        
        <!-- Campo de rango de edad dividido en mínimo y máximo -->
        <label class="block text-lg font-medium mb-2">Rango de Edad:</label>
        <div class="mb-4 space-y-4">

            <!-- Campo de Edad Mínima -->
            <div>
                <label for="min_age" class="block text-sm font-medium mb-1">Edad mínima: <span id="min_age_value">4</span></label>
                <input type="range" name="min_age" id="min_age" class="w-full" min="4" max="99" value="4" oninput="updateAgeRange()" required>
            </div>

            <!-- Campo de Edad Máxima -->
            <div>
                <label for="max_age" class="block text-sm font-medium mb-1">Edad máxima: <span id="max_age_value">99</span></label>
                <input type="range" name="max_age" id="max_age" class="w-full" min="4" max="99" value="99" oninput="updateAgeRange()" required>
            </div>
        </div>

        
        <!-- Campo numérico para la capacidad de beneficiarios, requerido -->
        <input type="number" min="1" max="5000" placeholder="Capacidad de beneficiarios" name="beneficiary_capacity" id="beneficiary_capacity" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Campo numérico para la capacidad de voluntarios, requerido -->
        <input type="number" min="0" max="5000" placeholder="Capacidad de voluntarios" name="volunteer_capacity" id="volunteer_capacity" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Campo de texto para el objetivo del programa, requerido -->
        <textarea placeholder="Objetivo" name="objetive" id="objetive" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required></textarea>
       
       
        <div id="input-container">
            <div class="input-group flex items-center mb-4">
                <input type="text" name="contents[]" placeholder="Contenido (opcional)" id="contents" class="w-full p-3 border border-gray-300 rounded-xl mb-4">
                <button type="button" class="remove-button bg-red-500 text-white p-2 rounded-md hover:bg-red-600 hidden">Eliminar</button>
                <button type="button" id="add-input" class="add-button bg-green-500 text-white p-2 rounded-md hover:bg-green-600">+</button>
            </div>
        </div>

        <!-- Campo de texto para la información de financiamiento (opcional) -->
        <textarea placeholder="Financiamiento (opcional)" name="financing" id="financing" class="w-full p-3 border border-gray-300 rounded-xl mb-4"></textarea>
        
        <!-- Campo de archivo para cargar la imagen del programa, requerido -->
        <input type="file" name="img" id="img" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Botón para enviar el formulario -->
        <button type="submit" class="bg-customGreen text-white px-8 py-2 rounded-xl w-full text-xl font-bold">Enviar</button>
        
        <!-- Botón para cerrar el modal -->
        <button type="button" onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded-xl mt-4 w-full text-xl">Cerrar</button>
    </form>
</div>



<!--TODA LA LOGICA DE JAVASCRIPT-->
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
        const placeField = document.getElementById('place');
        const meetingLinkField = document.getElementById('meeting_link');
        
        if (modality === 'presencial') {
            placeField.classList.remove('hidden');
            meetingLinkField.classList.add('hidden');
            meetingLinkField.value = ''; // Limpia el campo si estaba visible anteriormente
        } else if (modality === 'virtual') {
            meetingLinkField.classList.remove('hidden');
            placeField.classList.add('hidden');
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
document.getElementById('modal').addEventListener('submit', function(event) {
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
document.getElementById('modal').addEventListener('submit', function(event) {
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
            <input type="text" name="contents[]" placeholder="Contenido (opcional)" class="w-full p-3 border border-gray-300 rounded-xl mb-4">
            <button type="button" class="remove-button bg-red-500 text-white p-2 rounded-md hover:bg-red-600">Eliminar</button>
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