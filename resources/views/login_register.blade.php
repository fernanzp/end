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
        <div class="absolute flex items-center justify-center flex-col w-1/2 h-full left-0 transition-transform duration-500 " id="login">
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
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="password" type="password" name="password" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="password" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Contraseña</label>
                    <!--Icono para mostrar contraseña-->
                    <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePasswordVisibilityl('password-r')">
                        <svg id="icon-password-l" xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 fill-customBeige" viewBox="0 0 576 512">
                            <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                        </svg>
                    </span>
                </div>
                <input type="submit" value="Iniciar Sesión" class="w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen" name="btnIngresar">
            </form>
        </div>
        <!--Register-->
        <div class="absolute flex items-center justify-center flex-col w-1/2 h-full right-0 transition-transform duration-500" id="register">
            <h2 class="text-customBeige font-serif uppercase font-bold text-[50px]">Crea una cuenta</h2>
            <p class="text-customBeige text-[17px]">¿Ya tienes una cuenta? <a href="#" id="go-to-login" class="text-customGreen">Inicia sesión</a></p>
            <form method="POST" action="{{ route('register') }}" class="w-[70%]" id="register-form">
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
                    <p>Al hacer clic en Crear Cuenta, aceptas las <a href="" class="text-customGreen">Condiciones</a> y la <a href="" class="text-customGreen">Política de privacidad</a>.</p>
                </div>

                <button type="button" class="g-recaptcha w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen" data-sitekey="6LcC1V0qAAAAAPLP_kn9CehU1CWG6Ea4bDrs0Di6" data-callback='onSubmit' data-action='submit'>
                    Crear Cuenta
                </button>
                <!-- <input type="submit" value="Crear Cuenta" class="w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen" name="btnIngresar"> -->
            </form>
        </div>
    </div>
</body>
</html>

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
