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
                    <img src="{{ asset(Auth::user()->profile_img) }}" alt="User Image" class="my-4 w-16 h-16 rounded-full mx-auto">
                    <p class="font-bold text-customBeige text-lg">¡Hola, {{ Auth::user()->name }} {{ Auth::user()->last_name }}!</p>
                    
                    <a href="{{ Auth::user()->rol === 'user' || Auth::user()->rol === 'volunteer' || Auth::user()->rol === 'beneficiary' ? url('/configuration/myaccount') : url('/administration/analysis') }}" class="inline-flex items-center text-gray-500 text-base font-bold border-2 border-gray-500 rounded-lg px-2 py-1 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out mb-2 mt-4 space-x-2 whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="size-5"><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                        <span>
                            @if(Auth::user()->rol === 'user' || Auth::user()->rol === 'volunteer' || Auth::user()->rol === 'beneficiary')
                                Configuración
                            @else
                                Administración
                            @endif
                        </span>
                    </a>
                    
                    <a href="{{ url('/logout') }}" class="w-full inline-flex items-center justify-center text-gray-500 text-base font-bold border-2 border-gray-500 rounded-lg px-2 py-1 hover:text-gray-400 hover:border-gray-400 transition-colors duration-300 ease-in-out my-1 space-x-2 whitespace-nowrap">
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