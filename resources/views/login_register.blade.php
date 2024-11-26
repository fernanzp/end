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

        #login {
            transform: translateX(0);
        }

        #register {
            transform: translateX(100%);
        }

        #bg {
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="bg-transparent w-full fixed flex items-center p-2 z-50 transition-opacity duration-500">
        <a href="" class="ml-4">
            <img src="{{ asset('img/logo.png') }}" class="h-16">
        </a>
        <div class="flex items-center ml-4">
        <a href="{{ url('/') }}" class="text-2xl text-customBeige uppercase font-bold transition-colors duration-300 hover:text-customGreen">Inicio</a> 
        </div>
    </header>

    <!--Video de fondo-->
    <div class="relative w-full h-screen overflow-hidden">
        <video autoplay muted loop class="w-full h-full object-cover">
            <source src="{{ asset('video/video_login_register.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute top-0 left-1/2 w-1/2 h-full bg-gradient-to-r from-customDarkGray to-transparent z-0" id="gradient-bg"></div>
    </div>

    <!--Fondo del login y register-->
    <div class="absolute top-0 left-0 w-1/2 h-screen bg-customDarkGray transition-transform duration-500 ease-in-out" id="bg"></div>

    <!--Login y register-->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden" id="container_loginregister">
        <!--Login-->
        <div class="absolute flex items-center justify-center flex-col w-1/2 h-full left-0 transition-transform duration-500" id="login">
            <h2 class="text-customBeige font-serif uppercase font-bold text-[50px]">Inicia Sesión</h2>
            <p class="text-customBeige text-[17px]">¿Aún no tienes una cuenta? <a href="#" id="go-to-register" class="text-customGreen">Crea una</a></p>
            <form method="POST" action="{{ route('login') }}" class="w-[70%]">
                @csrf
                <!--Correo-->
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="email" type="text" name="email" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="email" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Correo</label>
                </div>
                <!--Contraseña-->
                <div class="relative my-6 w-full">
                    <div class="border border-transparent rounded-md overflow-hidden focus-within:border-customGreen">
                        <input id="password" type="password" name="password" required class="peer w-full h-14 px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                        <label for="password" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Contraseña</label>
                        <!--Icono para mostrar contraseña-->
                        <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePasswordVisibilityl('password-r')">
                            <svg id="icon-password-l" xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 fill-customBeige" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    </div>
                    @if ($errors->any())
                        <p class="text-red-500 absolute -bottom-6 left-0 text-sm">
                            {{ __('Los datos proporcionados no son correctos. Por favor, inténtalo nuevamente.') }}
                        </p>
                    @endif
                </div>
        
                <!-- Botón de inicio de sesión con Google -->
                <a href="{{ route('google.redirect') }}" class="flex items-center justify-center w-full text-[20px] font-bold text-customBeige bg-customBlue py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customBlue">
                    Iniciar Sesión con Google
                </a>
        
                <input type="submit" value="Iniciar Sesión" class="w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen" name="btnIngresar">
            </form>
        </div>
        
        <!--Register-->
        <div class="absolute flex items-center justify-center flex-col w-1/2 h-full right-0 transition-transform duration-500" id="register">
            <h2 class="text-customBeige font-serif uppercase font-bold text-[50px]">Crea una cuenta</h2>
            <p class="text-customBeige text-[17px]">¿Ya tienes una cuenta? <a href="#" id="go-to-login" class="text-customGreen">Inicia sesión</a></p>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-[70%]" id="register-form">
                @csrf
                <!--Correo-->
                <div class="relative my-6 w-full">
                    <div class="border border-transparent rounded-md overflow-hidden focus-within:border-customGreen">
                        <input id="email-r" type="text" name="email" value="{{ old('email') }}" required class="peer w-full h-14 px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                        <label for="email-r" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Correo</label>
                    </div>
                    @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!--Nombre-->
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="name" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Nombre</label>
                </div>
                <!--Apellidos-->
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="lastname" type="text" name="last_name" value="{{ old('last_name') }}" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="lastname" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Apellidos</label>
                </div>
                <!--Imagen de perfil
                <div class="form-group">
                    <label for="profile_img">Sube tu foto de perfil</label>
                    <input type="file" name="profile_img" id="profile_img" class="form-control" accept="image/*">
                </div>-->
                <!--Contraseña-->
                <div class="relative my-6 w-full">
                    <div class="border border-transparent rounded-md overflow-hidden focus-within:border-customGreen">
                        <input id="password-r" type="password" name="password" required class="peer w-full h-14 px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                        <label for="password-r" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Contraseña</label>
                        <!--Icono para mostrar contraseña-->
                        <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePasswordVisibilityr('password-r')">
                            <svg id="icon-password-r" xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 fill-customBeige" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    </div>
                    @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!--Confirmar Contraseña-->
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="confirm_password" type="password" name="password_confirmation" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="confirm_password" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Confirmar contraseña</label>
                </div>

                <div class="relative my-6 w-full text-customBeige">
                    <div class="flex items-center">
                        <!-- Checkbox para aceptar las condiciones y políticas de privacidad -->
                        <input type="checkbox" id="accept-terms" class="" required>
                        <p class="text-sm ml-2">
                            He leído y acepto las 
                            <a href="#" id="terms-link" class="text-customGreen">Condiciones</a> y la 
                            <a href="#" id="privacy-link" class="text-customGreen">Política de privacidad</a>.
                        </p>
                    </div>
                </div>
                
                <button type="button" class="g-recaptcha w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customDarkGreen hover:text-customDarkBeige" data-sitekey="6LcC1V0qAAAAAPLP_kn9CehU1CWG6Ea4bDrs0Di6" data-callback='onSubmit' data-action='submit'>
                    Crear Cuenta
                </button>
                <!-- <input type="submit" value="Crear Cuenta" class="w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen" name="btnIngresar"> -->
            </form>
        </div>
    </div>

    <x-legal />

    <script>
        // Elementos
        const login = document.getElementById('login');
        const register = document.getElementById('register');
        const bg = document.getElementById('bg');
        const gradientBg = document.getElementById('gradient-bg');

        // Botones
        const goToRegister = document.getElementById('go-to-register');
        const goToLogin = document.getElementById('go-to-login');

        // Event listener para cambiar a la vista de registro
        goToRegister.addEventListener('click', (event) => {
            event.preventDefault();
            history.pushState(null, '', '/END/public/index.php/register');
            // Ocultar login hacia la izquierda
            login.style.transform = 'translateX(-100%)';
            // Mostrar register desde la derecha
            register.style.transform = 'translateX(0)';
            // Mover el fondo hacia la izquierda (ajusta el valor para tu diseño)
            bg.style.transform = 'translateX(100%)';
            // Invertir el degradado
            gradientBg.style.transform = 'translateX(-100%)';
            gradientBg.classList.remove('bg-gradient-to-r');
            gradientBg.classList.add('bg-gradient-to-l');
        });

        // Event listener para cambiar a la vista de login
        goToLogin.addEventListener('click', (event) => {
            event.preventDefault();
            history.pushState(null, '', '/END/public/index.php/login');
            // Mostrar login desde la izquierda
            login.style.transform = 'translateX(0)';
            // Ocultar register hacia la derecha
            register.style.transform = 'translateX(100%)';
            // Mover el fondo de vuelta a la posición inicial
            bg.style.transform = 'translateX(0)';
            // Invertir el degradado
            gradientBg.style.transform = 'translateX(0)';
            gradientBg.classList.remove('bg-gradient-to-l');
            gradientBg.classList.add('bg-gradient-to-r');
        });

        // Cambiar el estado inicial basado en la variable de PHP
        @if($login_register == 'register')
            // Mostrar registro
            goToRegister.click();
        @endif
    </script>

    <script>
        function togglePasswordVisibilityl() {
            const passwordField = document.getElementById("password");
            const icon = document.getElementById("icon-password-l");

            const iconPath = icon.querySelector("path");

            const isPasswordVisible = passwordField.type === "text";

            passwordField.type = isPasswordVisible ? "password" : "text";
            
            // Cambia el icono según la visibilidad
            iconPath.setAttribute("d", isPasswordVisible ? "M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" : "M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z");
        }
    </script>

    <script>
        function togglePasswordVisibilityr() {
            const passwordField = document.getElementById("password-r");
            const confirmPasswordField = document.getElementById("confirm_password");
            const icon = document.getElementById("icon-password-r");

            const iconPath = icon.querySelector("path");

            const isPasswordVisible = passwordField.type === "text";

            passwordField.type = confirmPasswordField.type = isPasswordVisible ? "password" : "text";
            
            // Cambia el icono según la visibilidad
            iconPath.setAttribute("d", isPasswordVisible ? "M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" : "M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z");
        }
    </script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LcC1V0qAAAAAPLP_kn9CehU1CWG6Ea4bDrs0Di6"></script>

    <script>
    function onSubmit(token) {
        // se puede deshabilitar el botón 
            const button = document.querySelector('.g-recaptcha');
        button.disabled = true;

        // Enviar el formulario
        document.getElementById("register-form").submit();
    }

    </script>

    <script>
        // Abre el modal y cambia su contenido dinámicamente
        document.getElementById('terms-link').addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado
            openModal('Condiciones', `
            <p>
            1. Introducción Bienvenido a la plataforma de la ONG. Estos Términos y Condiciones rigen el uso de esta plataforma y de los servicios ofrecidos. Al registrarse y utilizar esta plataforma, el usuario acepta cumplir con estos términos y condiciones. Si no está de acuerdo, se le solicita que no utilice la plataforma.
            </p>
            <p>2. Descripción de los Servicios La plataforma permite a los usuarios participar en los programas de la ONG, gestionar sus donaciones, ofrecerse como voluntarios, y obtener información sobre las actividades de la organización. La ONG se reserva el derecho de modificar o descontinuar los servicios en cualquier momento sin previo aviso.</p>
            <p>3 .Elegibilidad Para registrarse en la plataforma, los usuarios deben tener al menos 18 años. Los menores de edad pueden registrarse únicamente con la aprobación y supervisión de un tutor legal, quien proporcionará la información necesaria y se responsabilizará por el uso de la plataforma por parte del menor.</p>
            <p>4. Registro y Cuenta del Usuario

                Al registrarse, el usuario se compromete a proporcionar información precisa, completa y actualizada.
                El usuario es responsable de mantener la confidencialidad de su cuenta y de su contraseña, y acepta notificar a la ONG sobre cualquier acceso no autorizado.
                La ONG no se hace responsable por pérdidas o daños derivados del uso no autorizado de la cuenta.</p>
            <p>5. Uso Permitido El usuario acepta utilizar la plataforma únicamente para los fines permitidos por estos términos, las políticas de la ONG y la legislación aplicable. Está prohibido:

                Usar la plataforma para fines ilegales o no autorizados.
                Acceder, interferir o intentar dañar los sistemas de la plataforma mediante virus, hacking u otros métodos.
                Crear múltiples cuentas o proporcionar información falsa.</p>
            <p>
                6. Donaciones y Transacciones La plataforma permite realizar donaciones para apoyar los programas de la ONG. Al hacer una donación, el usuario acepta que:
                
                Las donaciones realizadas son finales y no reembolsables, salvo en circunstancias excepcionales a discreción de la ONG.
                La ONG utiliza las donaciones de acuerdo con sus fines y objetivos, aunque se esfuerza por respetar las preferencias de los donantes cuando sea posible.
                </p>
            <p>7. Participación en Programas de Voluntariado Los usuarios que se inscriban como voluntarios deben cumplir con las políticas de conducta y los requisitos específicos de cada programa. La ONG se reserva el derecho de rechazar o cancelar la participación de cualquier usuario que no cumpla con estas políticas.
            </p>
            <p>8. Privacidad y Protección de Datos La ONG se compromete a proteger los datos personales de los usuarios conforme a la Política de Privacidad, que es parte de estos términos. Al registrarse en la plataforma, el usuario acepta el tratamiento de sus datos según lo dispuesto en dicha política.</p>
            <p>9. Propiedad Intelectual Todo el contenido de la plataforma, incluidos textos, gráficos, logotipos, imágenes y software, es propiedad de la ONG o de sus licenciantes, y está protegido por las leyes de propiedad intelectual. Se prohíbe el uso, reproducción o distribución no autorizada de cualquier contenido de la plataforma.</p>
            <p>10. Limitación de Responsabilidad La ONG no será responsable de:

                Daños directos, indirectos, incidentales o consecuentes derivados del uso o incapacidad de uso de la plataforma.
                Cualquier fallo o interrupción en el funcionamiento de la plataforma, pérdida de datos o acceso no autorizado.
                La ONG se esfuerza por mantener la plataforma segura y funcional, pero no garantiza que esté libre de errores, virus u otros elementos perjudiciales.</p>
            <p>11. Modificaciones de los Términos y Condiciones La ONG se reserva el derecho de modificar estos Términos y Condiciones en cualquier momento. Las modificaciones serán efectivas desde su publicación en la plataforma. Se recomienda a los usuarios revisar los términos regularmente.</p>
            <p>12. Terminación del Acceso La ONG se reserva el derecho de suspender o cancelar el acceso del usuario a la plataforma si considera que ha violado estos Términos y Condiciones o cualquier otra política de la organización.</p>
            <p>
                13. Ley Aplicable y Jurisdicción Estos Términos y Condiciones se rigen por las leyes del país en el que está registrada la ONG. Cualquier disputa que surja en relación con estos términos será resuelta en los tribunales competentes de dicho país.</p>
            <p>14. Contacto Si tienes alguna pregunta sobre estos Términos y Condiciones, puedes ponerte en contacto con nosotros a través de:

                Correo electrónico: [info@EducationNon-Disparity.org]
                Teléfono: [+54 91 123 4567]
            </p>
            `);
        });

        document.getElementById('privacy-link').addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado
            openModal('Política de Privacidad', `
            <p>1. Introducción

                        Esta Política de Privacidad describe cómo nuestra organización recopila, utiliza y protege la información personal de los usuarios de nuestra plataforma. Nos comprometemos a respetar y proteger la privacidad de nuestros usuarios de acuerdo con las leyes y regulaciones aplicables.</p>
                    <p>
                        2. Información que Recopilamos
                        
                        Recopilamos distintos tipos de información de los usuarios para proporcionar y mejorar nuestros servicios. La información puede incluir:
                        
                        Información de Identificación Personal (IIP): nombre, dirección de correo electrónico, número de teléfono, dirección física, fecha de nacimiento y otros datos necesarios para el registro y la participación en los programas.
                        Información de Donación: historial de donaciones, montos donados y métodos de pago utilizados.
                        Información de Voluntariado: datos relacionados con las actividades voluntarias, intereses y disponibilidad.
                        Datos de Navegación: dirección IP, tipo de navegador, tiempo de acceso y páginas visitadas para análisis de uso de la plataforma.</p>
                    <p>3. Uso de la Información

                        Utilizamos la información recopilada para los siguientes fines:
                        
                        Proveer Servicios: procesar registros, administrar cuentas de usuario y proporcionar acceso a los programas educativos y de ayuda.
                        Mejorar la Plataforma: analizar el uso de la plataforma para mejorar nuestros servicios y la experiencia del usuario.
                        Comunicación: enviar notificaciones, actualizaciones, boletines y otros mensajes relevantes para los usuarios.
                        Cumplimiento Legal: cumplir con las leyes y regulaciones aplicables, así como proteger nuestros derechos legales y los de nuestros usuarios.</p>
                    <p>4. Compartición de la Información

                        Solo compartimos información personal en las siguientes circunstancias:
                        
                        Proveedores de Servicios: con terceros que ayudan a procesar pagos, realizar análisis y otros servicios necesarios para el funcionamiento de la plataforma.
                        Cumplimiento Legal: cuando sea necesario para cumplir con la ley, responder a procesos legales o proteger los derechos y la seguridad de la organización o de nuestros usuarios.
                        Con Consentimiento del Usuario: cuando los usuarios nos otorguen permiso explícito para compartir su información.</p>
                    <p>5. Retención de la Información

                        Conservaremos la información personal de los usuarios durante el tiempo que sea necesario para cumplir con los fines descritos en esta política, salvo que la ley exija o permita un período de retención más largo.</p>
                    <p>6. Derechos de los Usuarios

                        Los usuarios tienen derecho a acceder, rectificar o eliminar su información personal. También pueden oponerse al procesamiento de sus datos en ciertos casos. Para ejercer estos derechos, los usuarios pueden contactarnos a través de la información de contacto proporcionada en nuestra plataforma.</p>
                    <p>7. Seguridad de la Información

                        Implementamos medidas de seguridad razonables para proteger la información personal contra el acceso no autorizado, la alteración y la divulgación. Sin embargo, ningún sistema de seguridad es infalible, y no podemos garantizar la seguridad absoluta de los datos.</p>
                    <p>8. Privacidad de los Menores de Edad

                        Nuestra plataforma no está dirigida a menores de edad sin el consentimiento de un tutor legal. Los usuarios menores de edad deben contar con el consentimiento de sus padres o tutores para utilizar nuestros servicios.</p>
                    <p>9. Cambios en la Política de Privacidad

                        Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Notificaremos a los usuarios sobre cualquier cambio importante y actualizaremos la fecha de la última modificación al final de este documento.</p>
                    <p>
                        10. Contacto
                        
                        Si tienes preguntas o inquietudes sobre esta Política de Privacidad, puedes ponerte en contacto con nosotros a través de los canales de soporte indicados en nuestra plataforma.
                        
                        Correo electrónico: [info@EducationNon-Disparity.org]
                        Teléfono: [+54 91 123 4567]
                        Dirección: [Carretera Manzanillo-Cihuatlan Km. 20, 28860 Manzanillo, Col.]</p>
                    <p>11. Aceptación de la Política de Privacidad Al utilizar la plataforma, el usuario reconoce haber leído y comprendido esta Política de Privacidad y acepta la recopilación, uso y almacenamiento de su información personal conforme a los términos aquí expuestos.</p>
            `);
        });

        // Función para abrir el modal con contenido dinámico
        function openModal(title, content) {
            document.getElementById('modal-title').innerText = title; // Cambiar el título
            document.getElementById('modal-content').innerHTML = content; // Cambiar el contenido
            document.getElementById('terms-modal').classList.remove('hidden'); // Mostrar el modal
        }

        // Cerrar el modal
        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('terms-modal').classList.add('hidden'); // Ocultar el modal
        });
    </script>

</body>
</html>