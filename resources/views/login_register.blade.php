<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>END</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--Estilos globales-->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Helvetica;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="bg-transparent w-full fixed flex items-center p-2 z-50 transition-opacity duration-500 @if ($login_register == 'register') justify-end @endif">
        <!-- Si la variable es 'register', invierte el orden de los elementos de la navbar -->
        @if ($login_register == 'register')
            <div class="flex items-center ml-4">
                <a href="" class="text-2xl text-customBeige uppercase font-bold transition-colors duration-300 hover:text-customGreen">Inicio</a> 
            </div>
            <a href="" class="ml-4">
                <img src="{{ asset('img/logo.png') }}" class="h-16">
            </a>
        @else
            <!--Navbar del login-->
            <a href="" class="ml-4">
                <img src="{{ asset('img/logo.png') }}" class="h-16">
            </a>
            <div class="flex items-center ml-4">
            <a href="" class="text-2xl text-customBeige uppercase font-bold transition-colors duration-300 hover:text-customGreen">Inicio</a> 
            </div>
        @endif
    </header>

    <!--Video de fondo-->
    <div class="relative w-full h-screen overflow-hidden">
        <video autoplay muted loop class="w-full h-full object-cover">
            <source src="{{ asset('video/video_login_register.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute top-0 left-1/2 w-1/2 h-full bg-gradient-to-r from-customDarkGrey to-transparent z-0"></div>
    </div>

    <!--Fondo del login y register-->
    <div class="absolute top-0 left-[-50%] w-full h-screen bg-customDarkGrey transition-transform duration-500 ease-in-out"></div>

    <!--Login y register-->
    <div class="absolute top-0 left-0 w-full h-full" id="container_loginregister">
        <!--Login-->
        <div class="absolute flex items-center justify-center flex-col w-1/2 h-full left-0 transition-transform duration-500">
            <h2 class="text-customBeige font-serif uppercase font-bold text-[50px]">Inicia Sesión</h2>
            <p class="text-customBeige text-[17px]">¿Aún no tienes una cuenta? <a href="#" id="go-to-register" class="text-customGreen">Crea una</a></p>
            <form method="" action="" class="w-[70%]">
                <div class="relative my-10 w-full overflow-hidden">
                    <input type="text" name="email" required class="w-full py-5 px-4 rounded-[12px] bg-customLightGrey text-customBeige text-[18px] font-bold border-none outline-none">
                    <label class="absolute buttom-0 left-0 w-full h-full pointer-events-none">
                        <span class="absolute text-white text-[18px] font-bold bottom-[18px] left-[15px] transition-all duration-300">Correo</span>
                    </label>
                </div>
                <input type="submit" value="Iniciar Sesión" class="w-full text-[20px] font-bold text-white bg-customGreen py-4 rounded-[32px] border-none cursor-pointer" name="btnIngresar">
            </form>
        </div>
    </div>
</body>
</html>