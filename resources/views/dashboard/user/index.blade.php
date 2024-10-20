<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-customLightGray">
    <h1>Bienvenido Usuario:</h1>
    <h2>Nombre: {{ Auth::user()->name }}</h2>
    <h2>Apellido: {{Auth::user()->last_name}}</h2>
    <h2>Email: {{ Auth::user()->email }}</h2>

    {{-- total de dinero donado --}}
    <h2>Total donado: ${{ $totalDonations['totalAmount'] }}</h2>
    <h2>Total de donaciones: {{ $totalDonations['total'] }}</h2>


    {{-- muestra todos los usuarios con su nombre, correo y rol --}}
    <h2>Usuarios:</h2>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }} - {{ $user->rol }}</li>
        @endforeach
    </ul>


</body>
</html>