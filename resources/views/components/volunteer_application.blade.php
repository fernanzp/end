<!-- Modal para solicitar ser Voluntario -->
<div id="voluntario-modal" class="modal fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center hidden">
    <div class="bg-customDarkGray w-1/3 rounded-lg shadow-lg p-6 h-4/5 overflow-y-auto">
        <h2 class="merriweather-bold text-customGreen text-3xl font-bold mb-4 text-center">Solicita ser voluntario</h2>
        <form action="{{ route('volunteer.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Fecha de nacimiento -->
            <div class="mb-4">
                <label for="birthdate" class="block text-customGreen font-bold text-xl mb-1">Fecha de nacimiento:</label>
                <input type="date" id="birthdate" name="birthdate" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
                <!--<small class="text-gray-500">Por favor, selecciona tu fecha de nacimiento.</small>-->
            </div>

            <!-- Género -->
            <div class="mb-4">
                <label for="gender" class="block text-customGreen font-bold text-xl mb-1">Género:</label>
                <select id="gender" name="gender" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <!-- Número telefónico -->
            <div class="mb-4">
                <label for="phone" class="block text-customGreen font-bold text-xl mb-1">Número telefónico:</label>
                <input type="tel" id="phone" name="phone" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" pattern="[0-9]{10}" placeholder="Ej: 3141557864" required>
            </div>

            <!-- Nivel de educación -->
            <div class="mb-4">
                <label for="education" class="block text-customGreen font-bold text-xl mb-1">Nivel de educación:</label>
                <select id="education" name="education" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4" required>
                    <option value="" disabled selected>Seleccione un nivel</option>
                    <option value="Sin educación formal">Sin educación formal</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Preparatoria">Preparatoria</option>
                    <option value="Educación superior">Educación superior</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="address" class="block text-customGreen font-bold text-xl mb-1">Dirección:</label>
                <input type="text" id="address" name="address" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" placeholder="Ingrese su dirección" required>
            </div>

            <!-- Cargar INE/DNI -->
            <div class="w-full mb-4">
                <p class="block text-customGreen font-bold text-xl mb-1">INE/DNI:</p>
                <input type="file" name="ine_document" id="ine_document" accept="image/*" class="hidden" onchange="updateFileNamev()"required>
                <div onclick="document.getElementById('ine_document').click();" class="w-full cursor-pointer bg-customLighterGray text-customBeige font-bold rounded-lg p-4">
                    <label for="ine_document" id="file_label" class="cursor-pointer">Selecciona un archivo</label>
                </div>
            </div>

            <!-- Botón de enviar -->
            <div class="grid grid-cols-2 gap-4 mt-3">
                <button type="button" onclick="document.getElementById('voluntario-modal').classList.add('hidden');" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                    Cancelar
                </button>
                <button type="submit" class="bg-transparent text-customGreen font-bold py-2 px-4 rounded border-customGreen border-4 hover:text-customLighterGray hover:bg-customGreen transition-colors duration-300 ease-in-out">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnPhXNZwg1HmdhWo7ECKUe_4YY7vMcT7Q&libraries=places&callback=initAutocomplete" async defer></script>

<script>
    let autocomplete;

    function initAutocomplete() {
        // Se obtiene el campo de entrada de la dirección
        const input = document.getElementById('address');
        
        // Crear un objeto de autocompletado asociado al campo de entrada
        autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['geocode'], // Solo permitir direcciones
            componentRestrictions: { country: 'mx' } // Restringir a México
        });

        // Opcional: Maneja el evento cuando el usuario selecciona una dirección
        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                // Aquí puedes manejar la información de la dirección seleccionada
                console.log('Dirección seleccionada:', place.formatted_address);
                // Si deseas hacer algo con el lugar seleccionado, como autocompletar otros campos, puedes hacerlo aquí
            } else {
                console.log('No se encontró información para la dirección');
            }
        });
    }
</script>

<script>
    // Selecciona el botón y el modal
    const openModalButton = document.getElementById('open-volunteer-modal');
    const modal = document.getElementById('voluntario-modal');

    // Escucha el evento 'click' para mostrar el modal
    openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden'); // Muestra el modal quitando la clase 'hidden'
    });

    // Escucha el evento 'click' fuera del modal o en áreas específicas para cerrarlo
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden'); // Oculta el modal agregando la clase 'hidden'
        }
    });
</script>

<script>
    function updateFileNamev() {
        const input = document.getElementById('ine_document');
        const label = document.getElementById('file_label');
        
        if (input.files && input.files[0]) {
            label.textContent = input.files[0].name; // Cambia el texto al nombre del archivo
        } else {
            label.textContent = 'Selecciona un archivo'; // Por si se borra el archivo seleccionado
        }
    }
</script>

<script>
function validateForm() {
    const telefono = document.getElementById('telefono').value;
    const ineDocument = document.getElementById('ine_document').files.length;

    // Validación de teléfono
    if (!telefono.match(/[0-9]{10}/)) {
        alert("Por favor, ingresa un número telefónico válido.");
        return false;
    }

    // Validación de archivo INE/DNI
    if (ineDocument === 0) {
        alert("Por favor, selecciona un archivo INE/DNI.");
        return false;
    }

    return true; // Si todo es válido, se envía el formulario
}
</script>

