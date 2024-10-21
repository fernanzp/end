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
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="email-r" type="text" name="email" value="{{ old('email') }}" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="email-r" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Correo</label>
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
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="password-r" type="password" name="password" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="password-r" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Contraseña</label>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!--Confirmar Contraseña-->
                <div class="relative my-6 w-full border border-transparent rounded-md h-14 overflow-hidden focus-within:border-customGreen">
                    <input id="confirm_password" type="password" name="password_confirmation" required class="peer w-full h-full px-4 pt-5 bg-customLightGray text-customBeige text-[18px] font-bold border-none outline-none placeholder-transparent">
                    <label for="confirm_password" class="absolute left-4 top-4 text-customBeige transition-all duration-300 cursor-text peer-placeholder-shown:top-4 peer-placeholder-shown:text-[18px] peer-placeholder-shown:text-customBeige peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-customGreen peer-valid:top-1 peer-valid:text-[14px] peer-valid:text-customGreen font-bold">Confirmar contraseña</label>
                </div>

                <button type="button"
    class="g-recaptcha w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen"
    data-sitekey="6LcC1V0qAAAAAPLP_kn9CehU1CWG6Ea4bDrs0Di6"
    data-callback='onSubmit'
    data-action='submit'>
    Crear Cuenta
</button>

                    {{-- <input type="submit" value="Crear Cuenta" class="w-full text-[20px] font-bold text-customBeige bg-customGreen py-4 rounded-[32px] border-none cursor-pointer transition-colors duration-300 hover:bg-customBeige hover:text-customGreen" name="btnIngresar"> --}}
            </form>
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
    goToRegister.addEventListener('click', () => {
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
    goToLogin.addEventListener('click', () => {
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
