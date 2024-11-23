<!-- Modal para solicitar ser Voluntario -->
<div id="voluntario-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-customLighterGray w-1/3 rounded-lg shadow-lg p-6 h-4/5 overflow-y-auto">
        <h2 class="merriweather-bold text-customGreen text-3xl font-bold mb-4 text-center">Conviértete en Voluntario</h2>
        <form id="voluntario-form" class="space-y-4" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <!-- Fecha de nacimiento -->
            <div>
                <label for="fecha-nacimiento" class="block text-customGreen font-bold text-xl mb-1">Fecha de nacimiento:</label>
                <input type="date" id="fecha-nacimiento" class="w-full bg-customLightGray text-customBeige font-bold rounded-lg p-4 border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
            </div>
        
            <!-- Género -->
            <div>
                <label for="genero" class="block text-customGreen font-bold text-xl mb-1">Género:</label>
                <select id="genero" class="w-full bg-customLightGray text-customBeige font-bold rounded-lg p-4">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        
            <!-- Número telefónico -->
            <div>
                <label for="telefono" class="block text-customGreen font-bold text-xl mb-1">Número telefónico:</label>
                <input type="tel" id="telefono" class="w-full bg-customLightGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" pattern="[0-9]{10}" placeholder="Ej: 3141557864" required>
            </div>
        
            <!-- Nivel de educación -->
            <div>
                <label for="educacion" class="block text-customGreen font-bold text-xl mb-1">Nivel de educación:</label>
                <select id="educacion" class="w-full bg-customLightGray text-customBeige font-bold rounded-lg p-4">
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Preparatoria">Preparatoria</option>
                    <option value="Universidad">Universidad</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        
            <!-- Dirección -->
            <div>
                <label for="codigo-postal" class="block text-customGreen font-bold text-xl mb-1">Dirección:</label>
                <input type="text" id="codigo-postal" class="w-full bg-customLightGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" maxlength="5" placeholder="Ingrese su dirección" required>
            </div>
        
            <!-- Cargar INE/DNI -->
            <div class="w-full">
                <p class="block text-customGreen font-bold text-xl mb-1">INE/DNI:</p>
                <input type="file" name="ine_document" id="ine_document" accept="image/*" class="hidden" onchange="updateFileName()">
                <div onclick="document.getElementById('ine_document').click();" class="w-full cursor-pointer bg-customLightGray text-customBeige font-bold rounded-lg p-4">
                    <label for="ine_document" id="file_label" class="cursor-pointer">Selecciona un archivo</label>
                </div>
            </div>
        
            <!-- Botón de enviar -->
            <div class="grid grid-cols-2 gap-4 mt-2">
                <button onclick="document.getElementById('voluntario-modal').classList.add('hidden');" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                    Cancelar
                </button>
                <button type="submit" class="bg-transparent text-customGreen font-bold py-2 px-4 rounded border-customGreen border-4 hover:text-customLighterGray hover:bg-customGreen transition-colors duration-300 ease-in-out">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>

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
    function updateFileName() {
        const input = document.getElementById('ine_document');
        const label = document.getElementById('file_label');
        
        if (input.files && input.files[0]) {
            label.textContent = input.files[0].name; // Cambia el texto al nombre del archivo
        } else {
            label.textContent = 'Selecciona un archivo'; // Por si se borra el archivo seleccionado
        }
    }
</script>