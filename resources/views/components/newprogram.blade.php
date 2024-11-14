<!-- Modal para crear un nuevo programa -->
<div id="modal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-60 hidden">
    
    <!-- Formulario para crear un nuevo programa, con envío de datos mediante POST y soporte para archivos adjuntos -->
    <form action="{{ route('programs.create') }}" method="POST" enctype="multipart/form-data" class="h-3/4 bg-white p-8 rounded-xl shadow-lg w-1/4 overflow-y-auto">
        
        <!-- Token CSRF para proteger el formulario contra ataques Cross-Site Request Forgery -->
        @csrf
        
        <!-- Título del formulario -->
        <h2 class="text-2xl font-bold mb-4 text-center">Nuevo programa</h2>
        
        <!-- Campo de texto para el título del programa, requerido -->
        <input type="text" placeholder="Título" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Campo de texto para una descripción corta del programa, requerido -->
        <input type="text" placeholder="Descripción corta" name="short_description" id="short_description" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
        
        <!-- Campo de texto para la descripción completa del programa, requerido -->
        <textarea placeholder="Descripción" name="description" id="description" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required></textarea>
        

        <!-- Botón de radio para seleccionar la duración del evento -->
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
            <input type="date" name="start_date" id="start_date" class="w-full p-3 border border-gray-300 rounded-xl mb-4" onchange="updateEndDateMin()"required>

            <!-- Campo de fecha de finalización -->
            <label for="end_date" class="block text-lg font-medium mb-2">Fecha de finalización:</label>
            <input type="date" name="end_date" id="end_date" class="w-full p-3 border border-gray-300 rounded-xl" required>
        </div>



        <!-- Selección de modalidad: presencial o en línea, requerido -->
        <label for="modality">Elige la modalidad:</label>
        <select name="modality" id="modality" class="w-full p-3 border border-gray-300 rounded-xl mb-4" required>
            <option value="presencial">Presencial</option>
            <option value="virtual">Virtual</option>
        </select>

        <!-- Campo de texto para la ubicación (solo si es presencial) -->
        <input type="text" placeholder="Ubicación" name="place" id="place" class="w-full p-3 border border-gray-300 rounded-xl mb-4">

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
        
        <!-- Campo de texto para especificar el contenido, en formato JSON (opcional) -->
        <textarea placeholder="Contenido (opcional)" name="contents" id="contents" class="w-full p-3 border border-gray-300 rounded-xl mb-4"></textarea>
        
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

//Funcion para validar la fecha

document.getElementById('program-form').addEventListener('submit', function(event) {
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    // Si no hay fecha de inicio o de finalización, o si la fecha final es antes de la fecha de inicio, bloqueamos el envío
    if (!startDate || !endDate) {
        alert('Por favor, complete ambos campos de fecha.');
        event.preventDefault(); // Evita el envío del formulario
        return;
    }

    if (new Date(endDate) < new Date(startDate)) {
        alert('La fecha de finalización no puede ser anterior a la fecha de inicio.');
        event.preventDefault(); // Evita el envío del formulario
    }
});

    // Función para actualizar la fecha mínima en el campo de fecha final
function updateEndDateMin() {
    const startDate = document.getElementById('start_date').value;
    const endDateInput = document.getElementById('end_date');
    
    // Actualiza el atributo min para la fecha de finalización
    endDateInput.setAttribute('min', startDate);
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
//Funcion para el input de edad
function updateAgeRange() {
    const minAgeInput = document.getElementById('min_age');
    const maxAgeInput = document.getElementById('max_age');
    const minAgeValue = document.getElementById('min_age_value');
    const maxAgeValue = document.getElementById('max_age_value');

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

//Funcion para verificar eventos de uno o varios dias
function toggleDateFields() {
    const isSingleDay = document.getElementById('single_day').checked;
    const singleDateField = document.getElementById('single_date_field');
    const multipleDatesFields = document.getElementById('multiple_dates_fields');
    const weekDaysField = document.getElementById('week_days_field');

    if (isSingleDay) {
        // Muestra solo el campo de fecha única y oculta los de fechas múltiples y días de la semana
        singleDateField.classList.remove('hidden');
        multipleDatesFields.classList.add('hidden');
        weekDaysField.classList.add('hidden');
        
        // Desactiva la necesidad de los campos de fecha de inicio y fin cuando no son necesarios
        document.getElementById('start_date').removeAttribute('required');
        document.getElementById('end_date').removeAttribute('required');
    } else {
        // Muestra los campos de fecha de inicio, fecha de fin y días de la semana
        singleDateField.classList.add('hidden');
        multipleDatesFields.classList.remove('hidden');
        weekDaysField.classList.remove('hidden');
        
        // Activa la necesidad de los campos de fecha de inicio y fin
        document.getElementById('start_date').setAttribute('required', 'required');
        document.getElementById('end_date').setAttribute('required', 'required');
    }
}

// Llamamos a la función una vez al cargar la página para aplicar el estado inicial
document.addEventListener('DOMContentLoaded', toggleDateFields);

</script>