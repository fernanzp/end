<x-head />

<body class="bg-customDarkGray font-sans antialiased">

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

        <!--Navbar-->
        <x-navbar_configuration />

        <!-- MAIN -->
        <main class="flex-1 mt-8">
            <h2 class="merriweather-bold text-3xl text-customGreen font-bold mb-4">Mi Cuenta</h2>

            <!-- Profile Info -->
            <div class="bg-customLighterGray shadow rounded-lg p-6 mb-6">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="{{ asset(Auth::user()->profile_img) }}" id="profile-preview" alt="User Image" class="w-16 h-16 rounded-full mx-auto">
                        <form id="profile-img-form" enctype="multipart/form-data">
                            <input type="file" name="profile_img" id="profile_img" accept="image/*" class="hidden" onchange="previewImage()">
                            <div onclick="document.getElementById('profile_img').click();" class="cursor-pointer absolute -bottom-2 -right-2 bg-customDarkGray p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#D3C5B4" class="w-4 h-4">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                </svg>
                            </div>
                        </form>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-customBeige">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
                        <p class="text-gray-400 text-lg">
                            @switch(Auth::user()->rol)
                                @case('coordinator')
                                    Coordinador
                                    @break
                                @case('user')
                                    Usuario
                                    @break
                                @case('admin')
                                    Administrador
                                    @break
                                @case('beneficiary')
                                    Beneficiario
                                    @break
                                @case('volunteer')
                                    Voluntario
                                    @break
                                @default
                                    {{ Auth::user()->rol }}
                            @endswitch
                        </p>
                        <p class="text-gray-400 text-lg">
                            Se registró el {{ Auth::user()->created_at->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Información Personal -->
            <div class="bg-customLighterGray shadow rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-xl text-customGreen">Información Personal</h3>
                    <button class="text-customBeige flex items-center space-x-1 modal-link transition duration-300 hover:text-customGreen" data-modal-target="information-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentcolor" class="w-4 h-4 mr-1">
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                        </svg>
                        Editar
                    </button>
                </div>

                <div id="info-personal" class="grid grid-cols-2 gap-4 text-gray-400">
                    <p class="text-customBeige font-semibold">Nombre(s): <span id="nombres-text" class="text-gray-400">{{ Auth::user()->name }}</span></p>
                    <p class="text-customBeige font-semibold">Apellidos: <span id="apellidos-text" class="text-gray-400">{{ Auth::user()->last_name }}</span></p>

                    @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'coordinator')
                        <p class="text-customBeige font-semibold">Correo: <span class="text-gray-400">{{ Auth::user()->email }}</span></p>
                    @else
                        @php
                            $user = Auth::user();
                            $info = $user->rol === 'beneficiary'
                                ? \App\Models\Beneficiary::where('user_id', $user->id)->first()
                                : ($user->rol === 'volunteer'
                                    ? \App\Models\Volunteer::where('user_id', $user->id)->first()
                                    : null);
                            $edad = $info ? \Carbon\Carbon::parse($info->birthdate)->age : 'N/A';
                            $telefono = $info ? $info->phone : 'N/A';
                            $direccion = $info ? $info->address : 'N/A';
                        @endphp

                        <p class="text-customBeige font-semibold">Correo: <span class="text-gray-400">{{ Auth::user()->email }}</span></p>

                        <!-- Mostrar Edad y Teléfono solo si el usuario es beneficiario o voluntario -->
                        @if($user->rol === 'beneficiary' || $user->rol === 'volunteer')
                            <p class="text-customBeige font-semibold">Edad: <span id="edad-text" class="text-gray-400">{{ $edad }}</span></p>
                            <p class="text-customBeige font-semibold">Teléfono: <span id="telefono-text" class="text-gray-400">{{ $telefono }}</span></p>
                        @endif

                        <!-- Mostrar Dirección solo si el usuario es beneficiario o voluntario -->
                        @if($user->rol === 'beneficiary' || $user->rol === 'volunteer')
                            <p class="text-customBeige font-semibold">Dirección: <span id="direccion-text" class="text-gray-400">{{ $direccion }}</span></p>
                        @endif
                    @endif

                    <p class="text-customBeige font-semibold">Rol: 
                        <span class="text-gray-400">
                            @switch(Auth::user()->rol)
                                @case('coordinator') Coordinador @break
                                @case('admin') Administrador @break
                                @case('beneficiary') Beneficiario @break
                                @case('volunteer') Voluntario @break
                                @default {{ Auth::user()->rol }}
                            @endswitch
                        </span>
                    </p>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>

    <!-- Modal de Términos y Condiciones -->
    <div id="terms-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
            <h2 class="text-xl font-semibold mb-4">Términos y Condiciones</h2>
            <p class="text-gray-700 mb-4">Aquí van los términos y condiciones de uso...</p>
            <button class="close-modal absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

 <!-- Modal de botón de editar información personal -->
 <div id="information-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-customLighterGray w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg relative">
        <h2 class="text-customGreen text-2xl font-bold mb-4">Editar Información Personal</h2>
        <form id="edit-personal-info-form" class="space-y-4" method="POST" action="{{ route('profile.update') }}" onsubmit="validateForm(event)">

            @csrf
            <!-- Nombre -->
            <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                <input type="text" name="name" id="edit-nombres" class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent" value="{{ Auth::user()->name }}" required>
                <label for="name" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Nombre</label>
            </div>

            <!-- Apellidos -->
            <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                <input type="text" name="last_name" id="edit-apellidos" class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent" value="{{ Auth::user()->last_name }}" required>
                <label for="last_name" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Apellido(s)</label>
            </div>

            <!-- Campos para Admin -->
            @if(Auth::user()->rol === 'admin')
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input type="email" name="email" id="edit-email" class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent" value="{{ Auth::user()->email }}" required>
                    <label for="email" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Correo</label>
                </div>
            @endif

        <!-- Campos compartidos entre Volunteer y Beneficiary -->
        @if(Auth::user()->rol === 'volunteer' || Auth::user()->rol === 'beneficiary')
        <!-- Teléfono -->
        <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
            <input type="tel" name="phone" id="edit-phone" class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent"value="{{ $telefono }}" inputmode="tel" maxlength="10" oninput="validatePhoneNumber(this)" required title="El teléfono debe tener exactamente 10 dígitos numéricos.">
            <label for="phone" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">
                Teléfono
            </label>
        </div>

        <script>
            function validatePhoneNumber(input) {
                // Reemplazar cualquier carácter no numérico
                input.value = input.value.replace(/\D/g, '');
            }
        </script>



        <!-- Dirección -->
        <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
            <input type="text" name="address" id="edit-address" 
                class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent" 
                value="{{ $direccion }}" required>
            <label for="address" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">
                Dirección
            </label>
        </div>
        @endif



            <!-- Campos para Coordinator -->
            @if(Auth::user()->rol === 'coordinator')
                <!-- No se agregan campos adicionales, ya que son los mismos que Admin -->
            @endif

            <div class="flex justify-end space-x-4">
                <button type="button" class="close-modal bg-transparent text-gray-500 font-bold py-2 px-4 rounded border-gray-500 border-4 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out">
                    Cancelar
                </button>
                <button type="submit" class="close-modal bg-transparent text-customGreen font-bold py-2 px-4 rounded border-customGreen border-4 hover:text-customLighterGray hover:bg-customGreen transition-colors duration-300 ease-in-out">
                    Guardar
                </button>
            </div>
        </form>
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
        // Funcionalidad para abrir y cerrar el modal
        document.querySelectorAll('.modal-link').forEach(button => {
            button.addEventListener('click', function () {
                const targetModal = this.getAttribute('data-modal-target');
                document.getElementById(targetModal).classList.remove('hidden');
            });
        });

        document.querySelectorAll('.close-modal').forEach(button => {
            button.addEventListener('click', function () {
                this.closest('.modal').classList.add('hidden');
            });
        });
    </script>

    <!--Script para previsualizar y enviar la imagen de perfil-->
    <script>
        function previewImage() {
            const file = document.getElementById('profile_img').files[0];
            const reader = new FileReader();
    
            reader.onload = function(e) {
                document.getElementById('profile-preview').src = e.target.result;
            };
    
            if (file) {
                reader.readAsDataURL(file);
            }
    
            // Envía la imagen al backend
            const formData = new FormData(document.getElementById('profile-img-form'));
            fetch("{{ route('profile.updateImage') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                // Aquí no hacemos nada con la respuesta
            })
            .catch(error => console.error('Error:', error));
        }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnPhXNZwg1HmdhWo7ECKUe_4YY7vMcT7Q&libraries=places&callback=initAutocomplete" async defer></script> 

<script>
    function initAutocomplete() {
        // Selecciona el campo de dirección por ID
        const input = document.getElementById('edit-address');

        // Crea una instancia de Autocomplete para el campo de dirección
        const autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['geocode'], // Solo permitir direcciones
            componentRestrictions: { country: 'mx' } // Restringir a México
        });

        // Agregar un listener para el evento 'place_changed'
        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                // Aquí puedes manejar la información de la dirección seleccionada
                console.log('Dirección seleccionada:', place.formatted_address);
            } else {
                console.log('No se encontró información para la dirección');
            }
        });
    }
</script>
</body>
</html>