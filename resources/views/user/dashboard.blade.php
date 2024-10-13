@extends('layouts.user.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800">Bienvenido, {{ $user->name }}</h1>
    <p class="text-gray-600 mt-2">Correo electrónico: {{ $user->email }}</p>

    <div class="mt-6 bg-white shadow-md rounded-lg p-6">
        <h4 class="text-xl font-semibold text-gray-700">Panel de Control</h4>
        <p class="mt-4 text-gray-600">Aquí puedes gestionar tus preferencias.</p>
        <!-- Contenido adicional del dashboard -->
    </div>
</div>
@endsection
