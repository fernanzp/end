@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800">Bienvenido, {{ $user->name }}</h1>

    <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Atención!</strong>
        <span class="block sm:inline">No tienes un correo electrónico registrado. Por favor, ingresa uno para continuar.</span>
    </div>

    <form action="{{ route('user.updateEmail') }}" method="POST" class="mt-6 bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Correo electrónico</label>
            <input type="email" class="w-full mt-2 p-2 border border-gray-300 rounded-lg @error('email') border-red-500 @enderror" 
                   id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Guardar
        </button>
    </form>
</div>
@endsection
