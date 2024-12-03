<div>
    <!-- NAVBAR -->
    <nav class="flex items-center justify-between rounded-lg bg-customLighterGray shadow px-6 py-4 relative">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="menuBar" class="w-8 h-8 cursor-pointer" fill="#1ab76a"><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
        <div class="flex items-center relative">
            <a href="#" class="notification relative mr-6" id="notificationBell">
                {{--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-8 h-8 cursor-pointer" fill="#1ab76a"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                <span class="num bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center absolute -top-1 -right-1">8</span>--}}
            </a>
            <!-- Dropdown de Notificaciones -->
            {{--<div id="notificationDropdown" class="hidden absolute right-0 mt-64 w-64 bg-white shadow-lg rounded-md overflow-hidden z-20">
                <div class="px-4 py-2 text-sm text-gray-700 border-b">Notificaciones</div>
                <ul class="py-2">
                    <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Notificación 1</li>
                    <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Notificación 2</li>
                    <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Notificación 3</li>
                </ul>
                <div class="px-4 py-2 text-sm text-center text-blue-500 cursor-pointer hover:underline">
                    Ver todas las notificaciones
                </div>
            </div>--}}
            <a href="#" class="profile" onclick="toggleMenu()">
                <img src="{{ asset(Auth::user()->profile_img) }}" alt="User Image" class="w-12 h-12 rounded-full mx-auto">
            </a>
        </div>
    </nav>
    <!-- NAVBAR -->
</div>