<!-- Modal para pedir la fecha de nacimiento del usuario -->
<div id="beneficiary-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Fecha de nacimiento</h2>
        <form method="POST" action="{{ route('beneficiary.store') }}">
            @csrf
            <div class="mb-4">
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Fecha de nacimiento:</label>
                <input type="date" id="birthdate" name="birthdate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="button" id="close-beneficiary-modal" class="mr-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg">Cancelar</button>
                <button type="submit" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg">Siguiente</button>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript para mostrar el primer modal para ingresar la fecha de nacimiento
    document.getElementById('open-beneficiary-modal').addEventListener('click', () => {
        document.getElementById('beneficiary-modal').classList.remove('hidden');
    });

    document.getElementById('close-beneficiary-modal').addEventListener('click', () => {
        document.getElementById('beneficiary-modal').classList.add('hidden');
    });
</script>

<!-- Modal para capturar información adicional según la edad -->
<div id="additional-info-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 id="modal-title" class="text-lg font-bold mb-4"></h2>
        <form method="POST" action="{{ route('beneficiary.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="beneficiary_id" value="{{ session('beneficiary_id') }}">
            
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Género:</label>
                <select id="gender" name="gender" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                    <option value="other">Otro</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono:</label>
                <input type="text" id="phone" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="education_level" class="block text-sm font-medium text-gray-700">Nivel de educación:</label>
                <select id="education_level" name="education_level" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="sineducaciónformal">Sin Educación Formal</option>
                    <option value="primaria">Primaria</option>
                    <option value="secundaria">Secundaria</option>
                    <option value="preparatoria">Preparatoria</option>
                    <option value="licenciatura">Licenciatura</option>
                    <option value="other">Otro</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Dirección:</label>
                <input type="text" id="address" name="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Campos adicionales para menores de edad -->
            <div id="minor-fields" class="hidden">
                <div class="mb-4">
                    <label for="guardian_email" class="block text-sm font-medium text-gray-700">Correo del tutor:</label>
                    <input type="email" id="guardian_email" name="guardian_email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="kinship" class="block text-sm font-medium text-gray-700">Parentesco:</label>
                    <select id="kinship" name="kinship" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="father">Padre</option>
                        <option value="mother">Madre</option>
                        <option value="tutor">Tutor</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
            </div>

            <!-- Campo para INE/DNI -->
            <div class="mb-4">
                <label for="guardian_ine" class="block text-sm font-medium text-gray-700">INE/DNI:</label>
                <input type="file" id="guardian_ine" name="guardian_ine" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="flex justify-end">
                <button type="button" id="close-additional-info-modal" class="mr-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg">Cancelar</button>
                <button type="submit" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript para mostrar el segundo modal y mostrar los campos según la edad
    document.addEventListener('DOMContentLoaded', () => {
        const showModal = {{ session('showModal') ? 'true' : 'false' }};
        const isAdult = {{ session('isAdult') ? 'true' : 'false' }};
        const additionalModal = document.getElementById('additional-info-modal');
        
        // Mostrar el modal solo si se establece `showModal` en la sesión
        if (showModal) {
            additionalModal.classList.remove('hidden');
            document.getElementById('modal-title').innerText = isAdult ? 'Información adicional (Adulto)' : 'Información adicional (Menor de Edad)';
            
            if (!isAdult) {
                document.getElementById('minor-fields').classList.remove('hidden');
            }
        }
    });

    // Escuchar el botón para cerrar el modal y borrar la sesión
    document.getElementById('close-additional-info-modal').addEventListener('click', () => {
        document.getElementById('additional-info-modal').classList.add('hidden');
        // Eliminar la variable de sesión `showModal` para que el modal no aparezca tras recargar la página
        {{ session()->forget('showModal') }};
    });
</script>