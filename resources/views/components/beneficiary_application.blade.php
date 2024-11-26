<!-- Modal para pedir la fecha de nacimiento del usuario -->
<div id="beneficiary-modal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden">
    <div class="bg-customDarkGray w-1/4 rounded-lg shadow-lg p-6 h-3/8 overflow-y-auto">
        <h2 class="merriweather-bold text-customGreen text-3xl font-bold mb-4 text-center">Solicita ser beneficiario</h2>
        <form method="POST" action="{{ route('beneficiary.store') }}">
            @csrf
            <!-- Fecha de nacimiento -->
            <div class="mb-4">
                <label for="birthdate" class="block text-customGreen font-bold text-xl mb-1">Fecha de nacimiento:</label>
                <input type="date" id="birthdate" name="birthdate" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" required>
            </div>
            <!-- Botónes de Cancelar y siguiente -->
            <div class="grid grid-cols-2 gap-4 mt-2">
                <button type="button" id="close-beneficiary-modal" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                    Cancelar
                </button>
                <button type="submit" class="bg-transparent text-customGreen font-bold py-2 px-4 rounded border-customGreen border-4 hover:text-customLighterGray hover:bg-customGreen transition-colors duration-300 ease-in-out">
                    Siguiente
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('open-beneficiary-modal').addEventListener('click', () => {
        fetch("{{ route('check.beneficiary') }}", {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            const alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = ''; // Limpiar alertas previas

            if (data.exists) {
                if (data.status === 'incomplete') {
                    // Si el formulario está incompleto, abrir el segundo modal
                    document.getElementById('additional-info-modal').classList.remove('hidden');
                    document.getElementById('modal-info').innerText = data.isAdult ? 
                        'Información adicional (Adulto)' : 'Información adicional (Menor de Edad)';
                    
                    if (!data.isAdult) {
                        document.getElementById('minor-fields').classList.remove('hidden');
                    }
                } else if (data.html) {
                    // Si hay HTML (alerta para pendiente o aprobado), inyectarlo
                    alertContainer.innerHTML = data.html;

                    // Configurar cierre del modal
                    const modal = document.getElementById('alert-modal');
                    const closeModal = document.getElementById('close-modal');

                    closeModal.addEventListener('click', () => {
                        modal.remove();
                    });

                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.remove();
                        }
                    });
                }
            } else {
                // Si no existe beneficiario, abrir el primer modal
                document.getElementById('beneficiary-modal').classList.remove('hidden');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    document.getElementById('close-beneficiary-modal').addEventListener('click', () => {
        document.getElementById('beneficiary-modal').classList.add('hidden');
    });
</script>

<!-- Modal para capturar información adicional según la edad -->
<div id="additional-info-modal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden">
    <div class="bg-customDarkGray w-1/3 rounded-lg shadow-lg p-6 h-4/5 overflow-y-auto">
        <h2 class="merriweather-bold text-customGreen text-3xl font-bold mb-4 text-center">Solicita ser beneficiario</h2>
        <p id="modal-info" class="text-customBeige text-sm"></p>
        <form method="POST" action="{{ route('beneficiary.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="beneficiary_id" value="{{ session('beneficiary_id') }}">
            
            <!-- Género -->
            <div class="mb-4">
                <label for="gender" class="block text-customGreen font-bold text-xl mb-1">Género:</label>
                <select id="gender" name="gender" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4">
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                    <option value="other">Otro</option>
                </select>
            </div>

            <!-- Número telefónico -->
            <div class="mb-4">
                <label for="phone" class="block text-customGreen font-bold text-xl mb-1">Número telefónico:</label>
                <input type="tel" id="phone" name="phone" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" pattern="[0-9]{10}" placeholder="Ej: 3141557864" required>
            </div>

            <!-- Nivel de educación -->
            <div class="mb-4">
                <label for="education_level" class="block text-customGreen font-bold text-xl mb-1">Nivel de educación:</label>
                <select id="education_level" name="education_level" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4" required>
                    <option value="" disabled selected>Seleccione un nivel</option>
                    <option value="sineducaciónformal">Sin educación formal</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Preparatoria">Preparatoria</option>
                    <option value="licenciatura">Educación superior</option>
                    <option value="other">Otro</option>
                </select>
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="address" class="block text-customGreen font-bold text-xl mb-1">Dirección:</label>
                <input type="text" id="address" name="address" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none" placeholder="Ingrese su dirección" required>
            </div>

            <!-- Campos adicionales para menores de edad -->
            <div id="minor-fields" class="hidden">
                <!--Correo del tutor-->
                <div class="mb-4">
                    <label for="guardian_email" class="block text-customGreen font-bold text-xl mb-1">Correo del tutor:</label>
                    <input type="email" id="guardian_email" name="guardian_email" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4 placeholder:text-customBeige border border-transparent focus:border-customGreen focus:ring-0 focus:outline-none">
                </div>
                <!--Parentesco con el tutor-->
                <div class="mb-4">
                    <label for="kinship" class="block text-customGreen font-bold text-xl mb-1">Parentesco:</label>
                    <select id="kinship" name="kinship" class="w-full bg-customLighterGray text-customBeige font-bold rounded-lg p-4">
                        <option value="father">Padre</option>
                        <option value="mother">Madre</option>
                        <option value="tutor">Tutor</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
            </div>

            <!-- Cargar INE/DNI -->
            <div class="w-full mb-4">
                <p class="block text-customGreen font-bold text-xl mb-1">INE/DNI:</p>
                <input type="file" name="guardian_ine" id="guardian_ine" accept="image/*" class="hidden" onchange="updateFileNameb()" required>
                <div onclick="document.getElementById('guardian_ine').click();" class="w-full cursor-pointer bg-customLighterGray text-customBeige font-bold rounded-lg p-4">
                    <label for="guardian_ine" id="file_labelb" class="cursor-pointer">Selecciona un archivo</label>
                </div>
            </div>

            <!-- Botónes de Cancelar y enviar -->
            <div class="grid grid-cols-2 gap-4 mt-2">
                <button type="button" id="close-additional-info-modal" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
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
    document.addEventListener('DOMContentLoaded', () => {
        const showModal = {{ session('showModal') ? 'true' : 'false' }};
        const isAdult = {{ session('isAdult') ? 'true' : 'false' }};
        const additionalModal = document.getElementById('additional-info-modal');

        // Mostrar el segundo modal si `showModal` está en la sesión
        if (showModal) {
            additionalModal.classList.remove('hidden');
            document.getElementById('modal-info').innerText = isAdult ? 'Información adicional (Adulto)' : 'Información adicional (Menor de Edad)';
            
            if (!isAdult) {
                document.getElementById('minor-fields').classList.remove('hidden');
            }
        }
    });

    // Escuchar el botón para cerrar el modal
    document.getElementById('close-additional-info-modal').addEventListener('click', () => {
        document.getElementById('additional-info-modal').classList.add('hidden');
        // Eliminar la variable de sesión `showModal` para que el modal no aparezca tras recargar la página
        {{ session()->forget('showModal') }};
    });
</script>

<script>
    function updateFileNameb() {
        const input = document.getElementById('guardian_ine');
        const label = document.getElementById('file_labelb');
        
        if (input.files && input.files[0]) {
            label.textContent = input.files[0].name; // Cambia el texto al nombre del archivo
        } else {
            label.textContent = 'Selecciona un archivo'; // Por si se borra el archivo seleccionado
        }
    }
</script>