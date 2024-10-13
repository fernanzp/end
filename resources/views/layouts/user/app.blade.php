<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="text-lg font-bold text-gray-800">Mi Aplicación</a>
                <div>
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 mx-2">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 mx-2">Registrarse</a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900 mx-2">Dashboard</a>
                        <a href="{{ url('/logout') }}" 
                           class="text-gray-700 hover:text-gray-900 mx-2"
                           {{-- onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> --}} >
                           Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>
</body>
</html>
