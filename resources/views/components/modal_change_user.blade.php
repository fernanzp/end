<!--Modal para solicitar ser beneficiario-->
<div id="beneficiario-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-customLighterGray w-1/3 rounded-lg shadow-lg p-6 h-4/5 overflow-y-auto">
        <h2 class="merriweather-bold text-customGreen text-3xl font-bold mb-4 text-center">Conviértete en Beneficiario</h2>
        <!--Opciones para seleccionar si el usuario es mayor o menor de edad-->
        <div class="flex justify-center space-x-4 mb-6">
            <button id="btn-mayor" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                Mayor de Edad
            </button>
            <button id="btn-menor" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Menor de Edad
            </button>
        </div>
        <!-- Formulario -->
        <div id="form-mayor" class="hidden">
            <form id="beneficiario-mayor-form" class="space-y-4">
                @csrf
             <!-- Fecha de nacimiento -->
                <div>
                    <label for="fecha-nacimiento" class="block text-gray-700">Fecha de nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" class="w-full border rounded-lg p-2" required>
                </div>
    
                <!-- Género -->
                <div>
                    <label for="genero" class="block text-gray-700">Género:</label>
                    <select id="genero" class="w-full border rounded-lg p-2">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
    
                <!-- Número telefónico -->
                <div>
                    <label for="telefono" class="block text-gray-700">Número telefónico:</label>
                    <input type="tel" id="telefono" class="w-full border rounded-lg p-2" pattern="[0-9]{10}" placeholder="10 dígitos" required>
                </div>
    
                <!-- Nivel de educación -->
                <div>
                    <label for="educacion" class="block text-gray-700">Nivel de educación:</label>
                    <select id="educacion" class="w-full border rounded-lg p-2">
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Universidad">Universidad</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
    
                <!-- Dirección -->
                <div>
                    <h3 class="text-lg font-semibold">Dirección</h3>
                    <!-- Código postal -->
                    <label for="codigo-postal" class="block text-gray-700">Código Postal:</label>
                    <input type="text" id="codigo-postal" class="w-full border rounded-lg p-2" maxlength="5" placeholder="Ingrese su CP" required>
                    
                    <!-- Estado -->
                    <label for="estado" class="block text-gray-700 mt-2">Estado:</label>
                    <input type="text" id="estado" class="w-full border rounded-lg p-2 bg-gray-200" disabled>
    
                    <!-- Municipio -->
                    <label for="municipio" class="block text-gray-700 mt-2">Municipio:</label>
                    <input type="text" id="municipio" class="w-full border rounded-lg p-2 bg-gray-200" disabled>
    
                    <!-- Colonia -->
                    <label for="colonia" class="block text-gray-700 mt-2">Colonia:</label>
                    <input type="text" id="colonia" class="w-full border rounded-lg p-2">
    
                    <!-- Calle -->
                    <label for="calle" class="block text-gray-700 mt-2">Calle:</label>
                    <input type="text" id="calle" class="w-full border rounded-lg p-2">
    
                    <!-- Número exterior e interior -->
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label for="numero-exterior" class="block text-gray-700">Número Exterior:</label>
                            <input type="text" id="numero-exterior" class="w-full border rounded-lg p-2">
                        </div>
                        <div>
                            <label for="numero-interior" class="block text-gray-700">Número Interior:</label>
                            <input type="text" id="numero-interior" class="w-full border rounded-lg p-2">
                        </div>
                    </div>
                </div>
    
                <!-- Cargar INE -->
                <div>
                    <label for="dni" class="block text-gray-700">Subir INE/DNI:</label>
                    <input type="file" id="dni" class="w-full border rounded-lg p-2" accept="image/*" required>
                </div>
                <!-- Botón de enviar -->
                <button type="submit" class="w-full bg-customGreen text-white py-2 rounded-lg mt-4">
                    Enviar
                </button>
                <button data-modal-toggle="beneficiario-modal" class="w-full bg-red-500 text-white py-2 rounded-lg mt-4">Cerrar</button>
            </form>
        </div>
        
            <!-- Formulario para menores de edad -->
        <div id="form-menor" class="hidden">
            <form id="beneficiario-menor-form" class="space-y-4">
                @csrf
                <!-- Fecha de nacimiento -->
                <div>
                    <label for="fecha-nacimiento" class="block text-gray-700">Fecha de nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" class="w-full border rounded-lg p-2" required>
                </div>
    
                <!-- Género -->
                <div>
                    <label for="genero" class="block text-gray-700">Género:</label>
                    <select id="genero" class="w-full border rounded-lg p-2">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
    
                <!-- Número telefónico -->
                <div>
                    <label for="telefono" class="block text-gray-700">Número telefónico:</label>
                    <input type="tel" id="telefono" class="w-full border rounded-lg p-2" pattern="[0-9]{10}" placeholder="10 dígitos" required>
                </div>
    
                <!-- Nivel de educación -->
                <div>
                    <label for="educacion" class="block text-gray-700">Nivel de educación:</label>
                    <select id="educacion" class="w-full border rounded-lg p-2">
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Universidad">Universidad</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <h3 class="text-lg font-semibold">Información del Tutor</h3>
                <!-- Dirección -->
                <div>
                    <h3 class="text-lg font-semibold">Dirección</h3>
                    <!-- Código postal -->
                    <label for="codigo-postal" class="block text-gray-700">Código Postal:</label>
                    <input type="text" id="codigo-postal" class="w-full border rounded-lg p-2" maxlength="5" placeholder="Ingrese su CP" required>
                    
                    <!-- Estado -->
                    <label for="estado" class="block text-gray-700 mt-2">Estado:</label>
                    <input type="text" id="estado" class="w-full border rounded-lg p-2 bg-gray-200" disabled>
    
                    <!-- Municipio -->
                    <label for="municipio" class="block text-gray-700 mt-2">Municipio:</label>
                    <input type="text" id="municipio" class="w-full border rounded-lg p-2 bg-gray-200" disabled>
    
                    <!-- Colonia -->
                    <label for="colonia" class="block text-gray-700 mt-2">Colonia:</label>
                    <input type="text" id="colonia" class="w-full border rounded-lg p-2">
    
                    <!-- Calle -->
                    <label for="calle" class="block text-gray-700 mt-2">Calle:</label>
                    <input type="text" id="calle" class="w-full border rounded-lg p-2">
    
                    <!-- Número exterior e interior -->
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label for="numero-exterior" class="block text-gray-700">Número Exterior:</label>
                            <input type="text" id="numero-exterior" class="w-full border rounded-lg p-2">
                        </div>
                        <div>
                            <label for="numero-interior" class="block text-gray-700">Número Interior:</label>
                            <input type="text" id="numero-interior" class="w-full border rounded-lg p-2">
                        </div>
                    </div>
                </div>
    
                <!-- Cargar INE -->
                <div>
                    <label for="dni" class="block text-gray-700">Subir INE/DNI:</label>
                    <input type="file" id="dni" class="w-full border rounded-lg p-2" accept="image/*" required>
                </div>
                <!-- Botón de envío -->
                <!-- Botón de enviar -->
                <button type="submit" class="w-full bg-customGreen text-white py-2 rounded-lg mt-4">
                    Enviar
                </button>
                <button data-modal-toggle="beneficiario-modal" class="w-full bg-red-500 text-white py-2 rounded-lg mt-4">Cerrar</button>
            </form>
        </div>
    </div>
</div>

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
                <button type="button" data-modal-toggle="voluntario-modal" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
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

    // Selecciona todos los elementos con el atributo data-modal-toggle
    document.querySelectorAll('[data-modal-toggle]').forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const modalId = toggle.getAttribute('data-modal-toggle'); // Obtén el ID del modal
            const modal = document.getElementById(modalId); // Busca el modal en el DOM
    
    
            if (modal) {
                modal.classList.toggle('hidden'); // Alterna la clase "hidden" para mostrar/ocultar
            }
        });
    });
    
    //aqui detectara la api para el codigo postal
    document.getElementById('codigo-postal').addEventListener('input', async (e) => {
        const cp = e.target.value;
    
        if (cp.length === 5) {
            try {
                const response = await fetch(`https://api-tu-servicio.com/cp/${cp}`);
                const data = await response.json();
    
                if (data.estado && data.municipio) {
                    document.getElementById('estado').value = data.estado;
                    document.getElementById('municipio').value = data.municipio;
                } else {
                    alert('Código postal no válido.');
                }
            } catch (error) {
                console.error('Error al buscar el CP:', error);
            }
        }
    });
    //detectar si ya se puso el numero interior o exterior
    ['numero-exterior', 'numero-interior'].forEach(id => {
        document.getElementById(id).addEventListener('input', (e) => {
            if (e.target.value.trim() !== '') {
                console.log(`${id} ha sido llenado con: ${e.target.value}`);
            }
        });
    });
    
    
    // Cerrar modal al hacer clic fuera del contenido
    document.querySelectorAll('.fixed').forEach((modal) => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
    
    document.addEventListener("DOMContentLoaded", () => {
        const btnMayor = document.getElementById("btn-mayor");
        const btnMenor = document.getElementById("btn-menor");
        const formMayor = document.getElementById("form-mayor");
        const formMenor = document.getElementById("form-menor");
    
        // Mostrar formulario de mayores por defecto
        formMayor.classList.remove("hidden");
    
        // Alternar a formulario de mayores de edad
        btnMayor.addEventListener("click", () => {
            formMayor.classList.remove("hidden");
            formMenor.classList.add("hidden");
        });
    
        // Alternar a formulario de menores de edad
        btnMenor.addEventListener("click", () => {
            formMenor.classList.remove("hidden");
            formMayor.classList.add("hidden");
        });
    });
    
    document.addEventListener("DOMContentLoaded", () => {
        const formMayor = document.getElementById("beneficiario-mayor-form");
        const formMenor = document.getElementById("beneficiario-menor-form");
    
        // Manejo del envío del formulario de mayores
        formMayor.addEventListener("submit", (event) => {
            event.preventDefault(); // Evitar el envío por defecto
            if (!formMayor.classList.contains("hidden")) {
                const formData = new FormData(formMayor);
                console.log(Object.fromEntries(formData));
                // Enviar datos al servidor con fetch() o axios
            }
        });
    
        // Manejo del envío del formulario de menores
        formMenor.addEventListener("submit", (event) => {
            event.preventDefault(); // Evitar el envío por defecto
            if (!formMenor.classList.contains("hidden")) {
                const formData = new FormData(formMenor);
                console.log(Object.fromEntries(formData));
                // Enviar datos al servidor con fetch() o axios
            }
        });
    });
    
    // Selección de elementos
    const modalVoluntario = document.getElementById("modal-voluntario");
    const abrirModalVoluntario = document.getElementById("abrir-modal-voluntario"); // El botón para abrir
    const cerrarModalVoluntario = document.getElementById("cerrar-modal-voluntario");
    
    // Función para abrir el modal
    abrirModalVoluntario.addEventListener("click", () => {
        modalVoluntario.classList.remove("hidden");
    });
    
    
    
    // Función para abrir/cerrar el modal
    document.querySelectorAll("[data-modal-toggle]").forEach((btn) => {
        btn.addEventListener("click", (event) => {
            const targetId = btn.getAttribute("data-modal-target");
            const modal = document.getElementById(targetId);
            modal.classList.toggle("hidden");
        });
    });
    
    // Función para cerrar modales con el botón de cerrar
    document.querySelectorAll("[data-modal-hide]").forEach((btn) => {
        btn.addEventListener("click", (event) => {
            const targetId = btn.getAttribute("data-modal-hide");
            const modal = document.getElementById(targetId);
            modal.classList.add("hidden");
        });
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