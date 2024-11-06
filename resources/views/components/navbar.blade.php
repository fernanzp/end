<nav class="absolute top-0 w-full z-10">
    <ul class="flex justify-center space-x-8 p-4 bg-transparent text-customBeige">
    <li class="list-none">
            <a href="{{ url('/') }}" class="a-hover relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                Inicio
            </a>
        </li>
        <li class="list-none">
            <a href="{{ url('/programs') }}" class="a-hover relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                Programas
            </a>
        </li>
        <li class="list-none">
            <a href="{{ url('/donations') }}" class="a-hover relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                Donaciones
            </a>
        </li>

        <li class="list-none relative">
            @auth
            <a href="javascript:void(0);" id="perfilBtn" class="a-hover relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">
                Perfil
            </a>
            <div id="perfilContent" class="hidden absolute left-0 mt-2 w-min bg-customDarkGray shadow-lg transform translate-x-4 border border-transparent rounded-md">
                <div class="p-4 bg-customDarkGray text-center">
                    <p class="text-customGreen text-sm">{{ Auth::user()->email }}</p>
                    <img src="{{ asset(Auth::user()->profile_img) }}" alt="User Image" class=" my-4 w-16 h-16 rounded-full mx-auto">
                    <p class="font-bold text-customBeige text-lg">¡Hola, {{ Auth::user()->name }} {{ Auth::user()->last_name}}!</p>
                    <a href="{{ url('/logout') }}" class="inline-flex items-center text-gray-500 text-lg font-bold border-2 border-gray-500 rounded-lg px-2 py-1 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out my-4 space-x-2 whitespace-nowrap">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/>
                        </svg>
                        <span>Cerrar sesión</span>
                    </a>
                </div>
            </div>
            @else
                <a href="{{ url('/login') }}" class="a-hover relative text-customBeige text-xl transition duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:font-bold">Iniciar sesión</a>
            @endauth
        </li>
    </ul>
</nav>