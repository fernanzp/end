<x-head />

<body class="bg-customDarkGray">
    <!-- Estilos globales -->
    <style>
        <x-styles />
    </style>
    
    <div class="relative h-screen w-full">
        <video autoplay muted loop class="object-cover w-full h-full">
            <source src="{{ asset('video/video-activities.mp4') }}" type="video/mp4">
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

    <div class="container bg-customDarkGray mx-auto p-4 m-8">
        <h2 class="merriweather-bold text-4xl font-bold text-center text-customBeige mb-8">Programas</h2>
        <!-- Filters -->
        <div class="flex gap-4 mb-6">
            <form method="GET" action="{{ url('/programs') }}" class="w-full flex gap-2">
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

    <!-- Footer -->
    <x-footer />
    <!--Chat-->
    <x-chat_global />

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